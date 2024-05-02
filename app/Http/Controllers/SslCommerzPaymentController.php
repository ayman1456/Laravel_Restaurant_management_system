<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Library\SslCommerz\SslCommerzNotification;

class SslCommerzPaymentController extends Controller
{

    public function exampleEasyCheckout()
    {
        return view('exampleEasycheckout');
    }

    public function exampleHostedCheckout()
    {
        return view('exampleHosted');
    }



    public function payViaAjax(Request $request)
    {

        # Here you have to receive all the order data to initate the payment.
        # Lets your oder trnsaction informations are saving in a table called "orders"
        # In orders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.
        $customer = json_decode($request->cart_json);

        $post_data = array();
        $post_data['total_amount'] = $customer->amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['name'] = $customer->name;
        $post_data['cus_email'] = $customer->email;
        $post_data['add1'] = $customer->addr1;
        $post_data['add2'] = $customer->addr2;
        $post_data['city'] = $customer->state;
        $post_data['state'] = $customer->state;
        $post_data['zip'] = $customer->zip;
        $post_data['country'] = $customer->country;
        $post_data['cus_phone'] = $customer->phone;

        $post_data['fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Dawat";
        $post_data['ship_add1'] = "Jamal khan, Chittagong";
        $post_data['ship_add2'] = "Jamal khan, Chittagong";
        $post_data['ship_city'] = "Jamal khan, Chittagong";
        $post_data['ship_state'] = "Jamal khan, Chittagong";
        $post_data['ship_postcode'] = "4000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "foods";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";


        $cartQuantity = Cart::where('customer_id', auth('customer')->id())->sum('qty');
        #Before  going to initiate the payment order status need to update as Pending.
        $update_product = Order::updateOrCreate(
            [
                'transaction_id' => $post_data['tran_id']
            ],
            [
                'name' => $post_data['name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'total_price' => $post_data['total_amount'],
                'status' => 'Pending',
                'address' => $post_data['add1'],
                'address2' => $post_data['add2'],
                'state' => $post_data['state'],
                'country' => $post_data['country'],
                'zip' => $post_data['zip'],
                'customer_id' => auth('customer')->id(),
                'qty' => $cartQuantity,
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency'],
                'payment' => 'ssl',

            ]
        );

        if ($update_product) {
            $carts = Cart::with('food:id,price')->where('customer_id', auth('customer')->user()->id)->get();
            foreach ($carts as $item) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $update_product->id;
                $orderItem->food_id = $item->food_id;
                $orderItem->qty = $item->qty;
                $orderItem->price = $item->food->price;
                $orderItem->save();
            }
        }



        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }
    public function payViaCash(Request $request)
    {


        # Here you have to receive all the order data to initate the payment.
        # Lets your oder trnsaction informations are saving in a table called "orders"
        # In orders table order uniq identity is "transaction_id","status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.



        $cartQuantity = Cart::where('customer_id', auth('customer')->id())->sum('qty');
        #Before  going to initiate the payment order status need to update as Pending.
        $update_product = Order::create(

            [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'total_price' => $request->amount,
                'status' => 'Pending',
                'address' => $request->address,
                'address2' => $request->address2,
                'state' => $request->state,
                'country' => $request->country,
                'zip' => $request->zip,
                'customer_id' => auth('customer')->id(),
                'qty' => $cartQuantity,
                'transaction_id' => uniqid(),
                'currency' => 'BDT',
                'payment' => 'cash',

            ]
        );

        if ($update_product) {
            $carts = Cart::with('food:id,price')->where('customer_id', auth('customer')->user()->id)->get();
            foreach ($carts as $item) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $update_product->id;
                $orderItem->food_id = $item->food_id;
                $orderItem->qty = $item->qty;
                $orderItem->price = $item->food->price;
                $orderItem->save();
                $item->delete();
            }
        }
        return redirect()->route('user.profile');
    }

    public function success(Request $request)
    {
        echo "Transaction is Successful";

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('customer_id', 'transaction_id', 'status', 'currency', 'total_price')->first();

        if ($order_details->status == 'Pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation) {
                $carts = Cart::with('food:id,price')->where('customer_id', $order_details->customer_id)->get();
                $user = Customer::find($order_details->customer_id) ?? null;
                if ($user) {

                    Auth::guard('customer')->login($user);
                }
                foreach ($carts as $item) {
                    $item->delete();
                }
                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Complete']);

                echo "<br >Transaction is successfully Completed";
            }
        } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            echo "Transaction is successfully Completed";
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
        }
    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);
            echo "Transaction is Falied";
        } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }
    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_details->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);
            echo "Transaction is Cancel";
        } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }
    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                }
            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }
}
