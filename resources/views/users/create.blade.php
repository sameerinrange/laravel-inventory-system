@extends('layouts.tabler')

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center mb-3">
            <div class="col">
                <h2 class="page-title">
                    {{ __('Create User') }}
                </h2>
            </div>
        </div>

        @include('partials._breadcrumbs')
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">

            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">
                                    {{ __('User Image') }}
                                </h3>

                                <img class="img-account-profile mb-2"
                                     src="{{ asset('assets/img/demo/user-placeholder.svg') }}"
                                     alt=""
                                     id="image-preview"
                                >

                                <div class="small font-italic text-muted mb-2">
                                    JPG or PNG no larger than 1 MB
                                </div>

                                <input type="file"
                                       id="image"
                                       name="photo"
                                       accept="image/*"
                                       onchange="previewImage();"
                                       class="form-control @error('photo') is-invalid @enderror"
                                >

                                @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">
                                    {{ __('User Details') }}
                                </h3>

                                <div class="row row-cards">
                                    <div class="col-md-12">

                                        <x-input name="name" :value="old('name')" required="true"/>

                                        <x-input name="shop_name" :value="old('shop_name')" required="true" label="Shop Name"   />

                                        <x-input name="email" :value="old('email')" required="true"/>

                                        <x-input name="username" :value="old('username')" required="true"/>

                                         
                                        <x-input name="phone" :value="old('phone')" required pattern="^\+?[0-9]{10,15}$" title="Enter a valid phone number (10-15 digits, optional + at start)"/>


                                        <!-- Currency Dropdown -->
                                        <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label for="currency_code" class="form-label">
                                                Currency
                                                <span class="text-danger">*</span>
                                            </label>
 
                                                <select name="currency_code" id="currency_code"
                                                        class="form-select @error('currency_code') is-invalid @enderror"
                                                >
                                                    <option selected="" disabled="">
                                                        Select Currency:
                                                    </option>

                                                    @foreach ($currencies as $currency)
                                                        <option value="{{ $currency->currency_code }}" {{ old('currency_code') == $currency->currency_code ? 'selected' : '' }}>
                                                            {{ $currency->name }} ({{ $currency->currency_symbol }})
                                                        </option>
                                                    @endforeach
                                                </select>
                                             

                                            @error('currency_code')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
 



                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input type="password" name="password"/>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <x-input type="password" name="password_confirmation" label="Password Confirmation"/>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-end">
                                <x-button.save type="submit">
                                    {{ __('Save') }}
                                </x-button.save>

                                <x-button.back route="{{ route('users.index') }}">
                                    {{ __('Cancel') }}
                                </x-button.back>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@pushonce('page-scripts')
<script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endpushonce
