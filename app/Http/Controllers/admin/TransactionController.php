<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use Auth;
use DB;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('AuthorizeAdmin'); // LoggedIn User verification.
    }
    
     public function downloadPDF($id)
    {
	// update invoice_generate column because it generated the invoice.
	DB::table('transactions')->where('id', $id)->update(['invoice_generate' => '1']);

        $transaction = \App\Transaction::find($id);

        $pdf = \PDF::loadView('admin.transactions.pdf', compact('transaction'));

        return $pdf->download('transaction_details.pdf');
    }
    public function index()
    {
	// get All Transactions.
        $allTransactions = \App\Transaction::orderBy('id', 'desc')->where('invoice_generate', '0')->paginate(10);

        // Get Pending Transactions.
        $pendingTransactions = \App\Transaction::orderBy('id', 'desc')->where('status', '0')->where('invoice_generate', '0')->get();
        
        // Get invoice( show generated transactions pdf = invoices tab).
        $invoices = \App\Transaction::orderBy('id', 'desc')->where('invoice_generate', '1')->get();        
        
        return view('admin.transactions.transaction', ['AllTransactions' => $allTransactions, 'PendingTransactions' => $pendingTransactions, 'invoices' => $invoices ]);
    }
   
}

