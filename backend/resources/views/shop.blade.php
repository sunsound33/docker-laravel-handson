@extends('layouts.app')

@section('content')
<div class="container-fluid">
   <div class="">
       <div class="mx-auto" style="max-width:1200px">
            <h1 style="color:#555555; text-align:center; font-size:1.2em; padding:24px 0px; font-weight:bold;">商品一覧</h1>
            </section>
                <div class="cp_ipselect cp_sl01">
                    <select name="sort" id="sort_stock">
                        <option value="" hidden>Choose</option>
                        <option value="1">価格の高い順</option>
                        <option value="2">価格の低い順</option>
                        <option value="3">新着順</option>
                    </select>
                    <p></p>
                </div>
                <div class="d-flex flex-row flex-wrap">
                    @foreach($stocks as $stock)      
                    <div class="col-xs-6 col-sm-4 col-md-4 ">
                        <div class="mycart_box">
                            {{$stock->name}} <br>
                            {{$stock->fee}}円<br>
                                <img src="/image/{{$stock->imgpath}}" alt="" class="incart" >
                                    <br>
                                   {{$stock->detail}}
                                    <br>

                                    <form action="mycart" method="post">
                                        @csrf
                                        <input type="hidden" name="stock_id" value="{{ $stock->id }}">
                                        <input type="submit" value="カートに入れる">
                                    </form>
                            </div>
                            <a class="text-center" href="/">商品一覧へ</a>
                        </div>
                    @endforeach                    
                    </div>
                    <div class="text-center" style="width: 200px;margin: 20px auto;">
                    {{ $stocks->appends(request()->query())->links() }}
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
