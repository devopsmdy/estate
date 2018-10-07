@extends('layout.master')

@section('content')
<div class="accordion" id="help">
	<div class="card">
		<div class="card-header" id="headingSearch">
			<h5 class="mb-0">
				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">
					Search
				</button>
			</h5>
		</div>

		<div id="collapseSearch" class="collapse" aria-labelledby="headingSearch" data-parent="#help">
			<div class="card-body">
				<ul>
					<li>ရွာခ်င္တဲ႔ Township, Type စသၿဖင္႔ အမွန္ၿခစ္ၿပီးရွာလို႔ရတယ္</li>
					<li>Price ကို ဘယ္ေလာက္ကေန ဘယ္ေလာက္ၾကားေရြးရွာလို႔ရတယ္</li>
					<li class="text-warning">ဘာမွမေရြးရင္ အကုန္လံုးေရြးတယ္လို႔ယူဆၿပီး ရွာေပးတယ္။ ဥပမာ ၿမိဳ႔နယ္အားလံုးကဟာကို လိုခ်င္ရင္ Township ကိုဘာမွမေရြးပဲရွာပါ</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header" id="headingTown">
			<h5 class="mb-0">
				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTown" aria-expanded="false" aria-controls="collapseTown">
					Township
				</button>
			</h5>
		</div>
		<div id="collapseTown" class="collapse" aria-labelledby="headingTown" data-parent="#help">
			<div class="card-body">
				<ul>
					<li>Township နာမည္ေပးၿပီး Addလိုက္ရံုပါပဲ</li>
					<li>ရိွၿပီးသားကို ထပ္ထည္႔လို႔မရပါ</li>
					<li>Township နာမည္ၿပင္ခ်င္ရင္ Edit button ကိုနွိပ္ပါ။ ၿပီးရင္ၿပင္ခ်င္တဲ႔ Township ကိုေရြးၿပီး နာမည္အသစ္ေပးၿပီး ၿပင္လို႔ရပါတယ္</li>
					<li class="text-warning">ဥပမာ Hlaing ကို လိွဳင္လို႔ၿပင္ရင္ အရင္ "Hlaing" လို႔ၿပခဲ႔တဲ႔ေနရာေတြ အကုန္ "လိွဳင္" ဆိုၿပီးေၿပာင္းသြားမွာပါ</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header" id="headingType">
			<h5 class="mb-0">
				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseType" aria-expanded="false" aria-controls="collapseType">
					Type
				</button>
			</h5>
		</div>
		<div id="collapseType" class="collapse" aria-labelledby="headingType" data-parent="#help">
			<div class="card-body">
				<ul>
					<li>Type နာမည္ေပးၿပီး Addလိုက္ရံုပါပဲ</li>
					<li>ရိွၿပီးသားကို ထပ္ထည္႔လို႔မရပါ</li>
					<li>Type နာမည္ၿပင္ခ်င္ရင္ Edit button ကိုနွိပ္ပါ။ ၿပီးရင္ၿပင္ခ်င္တဲ႔ Type ကိုေရြးၿပီး နာမည္အသစ္ေပးၿပီး ၿပင္လို႔ရပါတယ္</li>
					<li class="text-warning">ဥပမာ Apartment ကို တိုက္ခန္းလို႔ၿပင္ရင္ အရင္ "Apartment" လို႔ၿပခဲ႔တဲ႔ေနရာေတြ အကုန္ "တိုင္ခန္း" ဆိုၿပီးေၿပာင္းသြားမွာပါ</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-header" id="headingEstate">
			<h5 class="mb-0">
				<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEstate" aria-expanded="false" aria-controls="collapseEstate">
					Real Estates
				</button>
			</h5>
		</div>
		<div id="collapseEstate" class="collapse" aria-labelledby="headingEstate" data-parent="#help">
			<div class="card-body">
				<ul>
					<li>"Real Estates" ကရိွၿပီးသား List ပါ။ အသစ္ထည္႔ခ်င္ရင္ "New Estates" မွာထည္႔ပါ</li>
					<li>အညိဳေရာင္က Not Available အစိမ္းေရာင္က Available ကို ကိုယ္စားၿပဳပါတယ္</li>
					<li>အသစ္ထည္႔တဲ႔ေနရာမွာ Township နဲ႔ Type ကရိွၿပီးသားထဲကပဲေရြးလိုက္ရံုပါ။ အသစ္ထည္႔ခ်င္ရင္ Label ကိုႏွိပ္ၿပီးထည္႔ပါ</li>
					<li>Real Estate ကိုၿပင္ခ်င္ရင္ အမွတ္စဥ္နံပါတ္ကို နွိပ္ၿပီးၿပင္လို႔ရပါတယ္။</li>
					<li class="text-warning">ၿပင္တဲ႔ေနရာမွာ အနီေရာင္ခ်ယ္ထားတာေတြကို အထူးသတိထားၿပီး (မၿပင္လိုရင္ အရင္ဟာတိုင္းၿပန္ေရြးရန္) ၿပင္ပါ</li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection