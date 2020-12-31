<?php 
  $con = mysqli_connect('localhost','root','','Person_table_name');
  $sql = "SELECT * FROM Person_table_name ";
  $run = mysqli_query($con,$sql);
?>

    <?php while($result = mysqli_fetch_assoc($run)) { ?>
	    <tr>
	      <td><?php echo $result['email']; ?></td>
	      <td><?php echo $result['name']; ?></td>
	      <td><?php 
	      		if($result['age'] >= 18){
		      		echo "Adult";
		      	}elseif($result['age'] <= 13){
		      		echo "Kid";
		      	}else{
		      		echo "Teen";
		      	}
	       		?>
	       	
	       </td>
	    </tr>
	 <?php } ?>



cart create function snippet 

public function addcart($id)
    {
    	$product = Product::findorFail($id);
    	$array = array();

    	$array['id'] = $id;
        $array['name'] = $product->name;
    	$array['qty'] = 1;
    	if($product->discount_price == null){
    		$array['price'] = $product->selling_price;
    	}else{
    		$array['price'] = $product->selling_price;
    	}
    	$array['weight'] = 1;
        $array['options']['product_id'] = $product->id;
    	$array['options']['image'] =$product->image ;
    	$array['options']['color'] = " " ;
    	$array['options']['size'] =" " ;
    	Cart::add($array);
    	return Response()->json(['success'=>'Addcart']);
 }


 core php formate ....

<?php 
  $con = mysqli_connect('localhost','root','','Person_table_name');
  $sql = "SELECT * FROM Person_table_name ";
  $run = mysqli_query($con,$sql);
?>

    <?php while($result = mysqli_fetch_assoc($run)) { ?>
	    <tr>
	      <td><?php echo $result['email']; ?></td>
	      <td><?php echo $result['name']; ?></td>
	      <td><?php 
	      		if($result['age'] >= 18){
		      		echo "Adult";
		      	}elseif($result['age'] <= 13){
		      		echo "Kid";
		      	}else{
		      		echo "Teen";
		      	}
	       		?>
	       	
	       </td>
	    </tr>
	 <?php } ?>

Laravel format eloquent ...
Model-
protected $guarded =[ ]; 

Controller-
public function index()
    {
        $persons = Person::all();
        $count = 1;
        return view('admin.personPage',compact('persons','count'));
    }

admin/personPage.blade.php-
@foreach($persons as $person)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td>{{ $persons->name}}</td>
                        <td>{{ $persons->email}}</td>
                        <td>@if($person->age >= 18)
                                     Adult
                                @elseif($person->age <= 13)
                                     Kids
                                @else
                                     Teen
                                @endif

                        </td>
                    </tr>
                @endforeach



