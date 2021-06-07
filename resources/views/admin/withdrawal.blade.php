@extends('merchant.layout.dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="card-title">Faire un retrait</h4>
                                    <p class="card-category">Retirer de l'argent sur votre compte</p>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{ route('merchant.home') }}" class="pull-right btn btn-success btn-fill"><i
                                            class="fa fa-arrow-left fa-lg"></i>
                                        Retour</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-justify mt-3">
                                        <form action="{{ route('merchant.cashWithdrawalModal') }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="text-justify">
                                                <p style="color: red">Votre demande de retrait sera traitée sous 72 heures
                                                    maximum.</p>
                                                <p>Merci de patienter et ne pas poser de réclamation durant ce délai.</p>
                                                {{-- <p>L'argent sera retiré sur le compte
                                                    <strong>{{ $phoneNumberAccount->phone_number }}</strong>
                                                </p> --}}

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Moyen de retrait</label>
                                                            <select name="phone" id="phone" class="form-control" required>
                                                                <option value="">Sélectionner un compte</option>
                                                                @foreach ($phoneNumberAccounts as $phoneNumberAccount)
                                                                    <option value="{{ $phoneNumberAccount->phone }}">
                                                                        {{ $phoneNumberAccount->phone }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Montant à retirer</label>
                                                            <input type="number" name="amount" class="form-control"
                                                                placeholder="500" min="500" required>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <button type="submit"
                                                        class="btn btn-info btn-fill">Valider</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
