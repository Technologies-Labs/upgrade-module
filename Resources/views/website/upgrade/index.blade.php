@extends('layouts.simple.master')

@section('content')
@php
    use Modules\Upgrade\Enum\UpgradePlanEnum;
@endphp
    <section>
        <div class="gap">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-lg-12">
                        <div class="row upgrade">
                            @foreach ($plans as $plan)
                                <div class="col-lg-3">
                                    <div class="widget">
                                        @if($plan->key == UpgradePlanEnum::PROFESSIONAL)
                                            <span class="professional"></span>
                                        @endif
                                        <h4 class="widget-title">{{$plan->name}}</h4>
                                        <span class="period">YER {{$plan->price}} <span style="color: #b3b3bf;">|<ins>{{$plan->period}}/{{$plan->period_type}}</ins></span></span>
                                        <ul class="pop-articles p-3">
                                            <li class="mb-2"><a title="" href="#">Can't login to Socimo</a><i class="icofont-dotted-left"></i></li>
                                            <li class="mb-2"><a title="" href="#">Can't login to Socimo</a><i class="icofont-dotted-left"></i></li>
                                            <li class="mb-2"><a title="" href="#">Can't login to Socimo</a><i class="icofont-dotted-left"></i></li>
                                            <li class="mb-2"><a title="" href="#">Can't login to Socimo</a><i class="icofont-dotted-left"></i></li>
                                            <li class="mb-2"><a title="" href="#">Can't login to Socimo</a><i class="icofont-dotted-left"></i></li>
                                        </ul>
                                            <livewire:upgrade::plans.choose-plan :user='$user' :plan="$plan">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <livewire:user::suggestion.site-suggestion :template="'link'" />


{{--                        <div class="main-wraper">--}}
{{--                            <h4 class="main-title">Our Prices</h4>--}}
{{--                            <h6 class="mb-4">Our prices included with tax and charged automated every month of 15th.--}}
{{--                            </h6>--}}
{{--                            <div class="price-plan-wraper">--}}
{{--                                <table class="table table-striped table-responsive-md">--}}
{{--                                    <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th>Customer Insights features</th>--}}
{{--                                            @foreach ($plans as $plan)--}}
{{--                                            <th>--}}
{{--                                                <ins>{{$plan->name}}</ins>--}}
{{--                                                <span>YER {{$plan->price}} {{$plan->period}}/{{$plan->period_type}}</span>--}}
{{--                                            </th>--}}
{{--                                            @endforeach--}}

{{--                                        </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                        <tr>--}}
{{--                                            <td>--}}
{{--                                                <h6>5 percent Transcation fee</h6>--}}
{{--                                                <a href="#" data-toggle="tooltip"--}}
{{--                                                    title="Aenean ac suscipit nibh. Sed tristique, mauris id venenatis faucibus, mi risus suscipit tortor, eleifend dignissim dolor enim in eros. Etiam finibus dui lectus">--}}
{{--                                                    <i class="icofont-exclamation-circle"></i>--}}
{{--                                                </a>--}}
{{--                                            </td>--}}
{{--                                            <td><i class="icofont-verification-check"></i></td>--}}
{{--                                            <td><i class="icofont-error"></i></td>--}}
{{--                                            <td><i class="icofont-verification-check"></i></td>--}}
{{--                                        </tr>--}}
{{--                                       <livewire:upgrade::plans.choose-plan :user='$user'>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                                <livewire:user::suggestion.site-suggestion :template="'link'" />--}}

{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


