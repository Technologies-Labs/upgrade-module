@extends('layouts.simple.master')

@section('content')
<section>
    <div class="gap">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-lg-11">
                    <div class="main-wraper">
                        <h4 class="main-title">Our Prices</h4>
                        <h6 class="mb-4">Our prices included with tax and charged automated every month of 15th.
                        </h6>
                        <div class="price-plan-wraper">
                            <table class="table table-striped table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>Customer Insights features</th>
                                        @foreach ($plans as $plan)
                                        <th>
                                            <ins>{{$plan->name}}</ins>
                                            <span>YER {{$plan->price}} {{$plan->period}}/{{$plan->period_type}}</span>
                                        </th>
                                        @endforeach

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h6>5 percent Transcation fee</h6>
                                            <a href="#" data-toggle="tooltip"
                                                title="Aenean ac suscipit nibh. Sed tristique, mauris id venenatis faucibus, mi risus suscipit tortor, eleifend dignissim dolor enim in eros. Etiam finibus dui lectus">
                                                <i class="icofont-exclamation-circle"></i>
                                            </a>
                                        </td>
                                        <td><i class="icofont-verification-check"></i></td>
                                        <td><i class="icofont-error"></i></td>
                                        <td><i class="icofont-verification-check"></i></td>
                                    </tr>
                                   <livewire:upgrademodule::plans.choose-plan :user='$user'>
                                </tbody>
                            </table>
                            <h5><i class="icofont-crown-queen"></i> More Powerful Features <b>Coming Soon!</b>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


