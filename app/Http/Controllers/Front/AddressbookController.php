<?php
namespace App\Http\Controllers\Front;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Addressbook;
use Illuminate\Support\Facades\Validator;

class AddressbookController extends Controller
{
	public $path ='front.modules.main.account.addressbook.';
    
    public function __construct(){
        $this->middleware('auth');
    }

	protected function rules()
	{
        return [

		          "firstname"  => ['required', 'string','max:255'],
				  "lastname"   => ['required', 'string','max:255'],
				  "company"    => ['nullable', 'string','max:255'],
				  "address_1"  => ['required', 'string','max:500'],
				  "address_2"  => ['nullable', 'string','max:500'],
				  "city"       => ['required', 'string','max:255'],
				  "postcode"   => ['required', 'string','max:255'],
				  "countryId"  => ['required', 'string','exists:countries,_id'],
				  "stateId"    => ['required','string','exists:states,_id'],
                  "phone"      => ['required','string','regex:/^([0-9]){9,15}$/i'],
				  "default"    => ['required','in:0,1']  
		       ]; 
	}
    
    public function index(){
        $addressbooks = Addressbook::where('userId',auth()->user()->_id)->get();
        return view($this->path.'index',compact('addressbooks'));
    }

    public function create(){
       return view($this->path.'create');
    }

    public function store(Request $request){
         
        $data           = $this->validate($request,$this->rules());
        $data['userId'] = auth()->user()->_id;
                          if($data['default'] == '1'){
                               $this->changeDefaultAddressbook();
                            }
        $response       = Addressbook::create($data);
        
        if(!is_null($response)){

	         return response()->json([        
	               'success'  => 'Addressbook created successfully.',
	               'redirect' => route('account.addressbook.index'),
	               'status'   => 1      
	         ],201);
        }
        else{

        	return response()->json([             
	               'success' => 'Addressbook is not created.',
	               'status'  => 0      
	         ],400);
        }
    }

    public function edit($addressbookEncodedId){

    	$addressbookId = base64_decode($addressbookEncodedId);
        $addressbook   = Addressbook::where('_id',$addressbookId)->first();
        if(is_null($addressbook)){
        	return abort('404');
        }
        return view($this->path.'edit',compact('addressbook'));
    }

    public function update(Request $request,$addressbookEncodedId){

    	$data          = $this->validate($request,$this->rules());
    	$addressbookId = base64_decode($addressbookEncodedId);
        $addressbook   = Addressbook::where('_id',$addressbookId)->first();

        if(is_null($addressbook)){
             
             return response()->json([       
	               'success' => 'Addressbook is not found.',
	               'status'  => 0      
	         ],400);

        }

        if($data['default'] == '1'){
           $this->changeDefaultAddressbook();
        }
        
        $response = $addressbook->fill($data)->update();

        if(!is_null($response)){

	         return response()->json([          
	               'success'  => 'Addressbook created successfully.',
	               'redirect' => route('account.addressbook.index'),
	               'status'   => 1      
	         ],201); 
        }
        else{

        	return response()->json([       
	               'success' => 'Addressbook is not created.',
	               'status'  => 0      
	         ],400);
        }

    }

    public function destroy($addressbookEncodedId){

        $addressbookId = base64_decode($addressbookEncodedId);
        $addressbook   = Addressbook::where('_id',$addressbookId)->first();
        if(is_null($addressbook)){
            return abort('404');
        }
        $addressbook->delete();
        return back()->with('success','Your addressbook is deleted successfully.');
    }

    protected function changeDefaultAddressbook(){
          //comment:change default=1 key to default=0 for other address if exist//
          Addressbook::where(['userId' => auth()->user()->_id,'default' => '1'])->update(['default' => '0']);
          return true;
    }
     
}  