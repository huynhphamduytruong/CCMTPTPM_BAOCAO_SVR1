<?php /* Happy coding */ ?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="pills-order-history-tab" data-toggle="pill" href="#pills-order-history" role="tab" aria-controls="pills-order-history" aria-selected="true">{{ __('Lịch sử đơn hàng') }}</a>
                    <a class="nav-link" id="pills-user-info-tab" data-toggle="pill" href="#pills-user-info" role="tab" aria-controls="pills-user-info" aria-selected="false">{{ __('Tài khoản') }}</a>
                    <a class="nav-link" id="pills-change-password-tab" data-toggle="pill" href="#pills-change-password" role="tab" aria-controls="pills-change-password" aria-selected="false">{{ __('Bảo mật') }}</a>
                    <a class="nav-link" id="pills-addresses-tab" data-toggle="pill" href="#pills-addresses" role="tab" aria-controls="pills-addresses" aria-selected="false">{{ __('Địa chỉ') }}</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-order-history" role="tabpanel" aria-labelledby="pills-order-history-tab">...</div>
                    <div class="tab-pane fade" id="pills-user-info" role="tabpanel" aria-labelledby="pills-user-info-tab">...</div>
                    <div class="tab-pane fade" id="pills-change-password" role="tabpanel" aria-labelledby="pills-change-password-tab">...</div>
                    <div class="tab-pane fade" id="pills-addresses" role="tabpanel" aria-labelledby="pills-addresses-tab">...</div>
                </div>
            </div>
        </div>
    </div>
@endsection
