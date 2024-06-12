@extends('admin.home')
@section('content')
<div id="dashboard_cont">
    <div class="container" id="main_cont">
        <div class="row" id="main_row">
            <div class="col-md-6 column">
                <div id="column_div">
                    <div id="column_div1">
                        <h1 class="text-center" id="text_h1">Total No. of Farmers</h1>
                        <h1 class="text-center" id="farmers_number">{{ $rowCount }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="flex-row" id="column_flex_row">
                    <div id="column_div1">
                        <h1 class="text-center" id="texth1">Total No. of Associations</h1>
                        <h1 class="text-center" id="associations_number">{{ $AssocrowCount }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="flex-row" id="column_flex_row">
                    <div id="column_div1">
                        <h1 class="text-center" id="text_h1">Farmers with RSBSA</h1>
                        <h1 class="text-center" id="generated_id_no">{{ $rowCount }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="flex-row" id="column_flex_row">
                    <div id="column_div1">
                        <h1 class="text-center" id="text_h1">Farmers with Generated I.D</h1>
                        <h1 class="text-center" id="generated_id_no">{{$GeneratedrowCount}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection