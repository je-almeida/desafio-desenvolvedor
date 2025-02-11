<form id="form-coin-conversion" class="container-coin-conversion">
    <div class="row">
        <div class="mb-3 col-md-6">
            <label for="payment_method" class="form-label">{{trans('home.label.payment_method')}}</label>
            <select id="payment_method" class="form-select">
                <option value=""></option>
                @foreach($config->getEnabledPayments() as $paymentMethod)
                <option value="{{$paymentMethod}}">{{trans('coin_convertion.success.array.payment_method.' . $paymentMethod)}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col-md-6">
            <label for="currency" class="form-label">{{trans('home.label.currency')}}</label>
            <select id="currency" class="form-select">
                <option value=""></option>
                @foreach($config->getEnabledCurrencies() as $currency)
                <option value="{{$currency}}">{{trans('home.options.' . $currency)}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="convertion_value" class="form-label">{{trans('home.label.convertion_value')}}</label>
            <input type="number" class="form-control" id="convertion_value">
        </div>

    </div>
    <button type="submit" class="btn btn-primary">Comprar</button>
</form>

<div class="row">
    <div class="alert alert-success success-coin-convert d-none"></div>
    <div class="alert alert-danger error-coin-convert d-none"></div>
    <input type="hidden" id="token" value="{{csrf_token()}}">
</div>
