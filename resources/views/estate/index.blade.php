@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-12 rounded">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Address</th>
                    <th scope="col">Road</th>
                    <th scope="col">Area</th>
                    <th scope="col">Type</th>
                    <th scope="col">Township</th>
                    <th scope="col">Price</th>
                    <th scope="col">Note</th>
                    <th scope="col">Deal</th>
                    <th scope="col">Picture</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1 ?>
                @foreach($estates as $estate)
                <?php
                    if($estate->status == 1 ) { 
                        $color="bg-success"; 
                    } else { 
                        $color="bg-secondary"; 
                    }
                ?>
                <tr class={{$color}}>
                    <th scope="row"><a class='border p-1 rounded border-warning bg-light' href="/estate/{{ $estate->id }}/edit"
                            class="text-dark" style="text-decoration: none">{{$i }}</a></th>
                    <td>{{$estate->address}}</td>
                    <td>{{$estate->road}}</td>
                    <td>{{$estate->area}}</td>
                    <td>{{$estate->type->name}}</td>
                    <td>{{$estate->township->name}}</td>
                    <td>{{$estate->price}}</td>
                    <td>{{$estate->note}}</td>
                    <td>{{$estate->deal}}</td>
                    <td><a href="/estate/{{ $estate->id }}/show" class="border border-success p-1 rounded bg-light" style="text-decoration: none;">More</a></td>
                </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
