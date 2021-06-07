<div class="container">
        <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Liste des Articles
                </h3>
            </div>
            <div class="card-toolbar">
                <div class="dropdown dropdown-inline mr-2">
                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @include("layouts.icons.ruller") Exporter
                    </button>

                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">

                        <ul class="navi flex-column navi-hover py-2">
                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                Choisissez une option:
                            </li>
                            <li class="navi-item">
                                {{-- <a href="{{route('exports.produit.print')}}" class="navi-link">
                                        <span class="navi-icon">
                                            <i class="la la-print"></i>
                                        </span>
                                    <span class="navi-text">Print</span>
                                </a> --}}
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                        <span class="navi-icon">
                                            <i class="la la-copy"></i>
                                        </span>
                                    <span class="navi-text">Copy</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                {{-- <a href="{{route('exports.produit.excel')}}" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-excel-o"></i>
                                    </span>
                                    <span class="navi-text">Excel</span>
                                </a> --}}
                            </li>
                            <li class="navi-item">
                                {{-- <a href="{{route('exports.produit.excel')}}" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-text-o"></i>
                                    </span>
                                    <span class="navi-text">CSV</span>
                                </a> --}}
                            </li>
                            <li class="navi-item">
                                {{-- <a href="{{route('exports.produit.pdf')}}" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="la la-file-pdf-o"></i>
                                    </span>
                                    <span class="navi-text">PDF</span>
                                </a> --}}
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                </div>

                <button type="button" data-toggle="modal" data-target="#modalArticle" class="btn btn-primary font-weight-bolder"><i class="la la-plus"></i> Ajouter un produit</button>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Search Form-->
            <!--begin::Search Form-->
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center ml-5">
                            <div class="col-md-3 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Nom Article" wire:model="search" />
                                    <span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3 my-2 my-md-0 ">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Etat:</label>
                                    <select class="form-control" id="kt_datatable_search_status" wire:model="etat_id">
                                        <option value=""></option>
                                        @foreach ($etats as $etat)
                                            <option value="{{$etat->id}}">{{$etat->nom}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div wire:loading wire:target="etat_id">
                                    Updating quantity...
                                </div>
                            </div>

                                <div class="col-md-3 my-2 my-md-0 ">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-3 mb-0 d-none d-md-block">Categorie:</label>
                                        <select class="form-control" wire:model="categorie_id" >
                                            <option value=""></option>
                                            @foreach ($categories as $categorie)
                                                <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3 my-2 my-md-0">
                                    <div class="d-flex align-items-center">
                                        <label class="mr-3 mb-0 d-none d-md-block">Transaction:</label>
                                        <select class="select form-control"  wire:model="transaction_id">
                                            <option value=""></option>
                                            @foreach ($transactions as $transaction)
                                                <option value="{{$transaction->id}}">{{$transaction->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--end::Search Form-->
            <!--end: Search Form-->
            <!--begin: Datatable-->
                <div class="container">
                    <div class="card card-custom gutter-b">
                        <div class="card-body">
                            <table class="table  table-checkable" id="kt_datatable">
                                <thead>
                                    <tr>
                                        <th><-T-></th>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Sous titre</th>
                                        <th>Description</th>
                                        <th>Prix</th>
                                        <th>Prix Réduit</th>
                                        <th>Prix suggestion</th>
                                        <th>Categorie</th>
                                        <th>Etat</th>
                                        <th>Transaction</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($produits as $produit)
                                        <tr>
                                            <td><input class="checkbox" type="checkbox" value="{{$produit->id}}" wire:model="produit_tab"></td>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $produit->nom }}</td>
                                            <td>{{ $produit->sous_titre }}</td>
                                            <td>{{ $produit->description }}</td>
                                            <td>{{ $produit->prix }}</td>
                                            <td>{{ $produit->prix_reduction }}</td>
                                            <td>{{ $produit->prix_suggestion1.' à '. $produit->prix_suggestion2 }}</td>
                                            <td>{{ $produit->categorie->nom ?? ''}}</td>
                                            <td>{{ $produit->etat->nom ?? ''}}</td>
                                            <td class="d-flex">
                                                <a href="{{ route("admin.product.details", $produit) }}" class="btn btn-icon btn-light btn-sm mr-2">
                                                    @include("layouts.icons.arrow-right")
                                                </a>
                                                <button wire:click="edit({{$produit->id}})" type="button" data-toggle="modal" data-target="#modalArticleUpdate"  class="btn btn-icon btn-light btn-sm mr-2">
                                                    @include("layouts.icons.pencil")
                                                </button>
                                                <form action="{{ route("admin.product.destroy", $produit) }}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-icon btn-light btn-sm delete-button">
                                                        @include("layouts.icons.trash")
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                     <div class="mt-4 ">
                        {{ $produits->links() }}
                    </div>

                    <div>

                    @if(!empty($produit_tab))






                        <div class="card">


                                <div class="card-header">
                                    <h4 class="text-danger">Modifications à effectuer</h4>
                                </div>

                                <div class="card-body">

                                    <div class="row">

                                        <div class="form-group col-md-4">

                                            <select class="form-control" wire:model="site_edit">
                                                <option value="">Selectionner un site</option>

                                                @foreach ($sites_edit as $site)
                                                    <option value="{{$site->id}}">{{$site->nom_site}}</option>
                                                @endforeach

                                            </select>
                                            @error('site_edit')

                                        <span class="text-danger">{{$message}}</span>
                                         @enderror
                                        </div>



                                    <div class="form-group col-md-4">

                                        <select class="form-control"  wire:model="etage_edit">
                                                    <option value="">Selectionner un etage</option>
                                                    @if(!is_null($site_edit))
                                                    @foreach ($etages_edit as $etage)
                                                        <option value="{{$etage->id}}">{{$etage->nom_etage}}</option>
                                                    @endforeach
                                                    @endif

                                        </select>
                                        @error('etage_edit')

                                        <span class="text-danger">{{$message}}</span>
                                         @enderror
                                    </div>


                                    <div class="form-group col-md-4">

                                        <select class="form-control"  wire:model="piece_edit">
                                                    <option value="">Selectionner une piece</option>
                                                    @if(!is_null($etage_edit))
                                                    @foreach ($pieces_edit as $piece)
                                                        <option value="{{$piece->id}}">{{$piece->nom_piece}}</option>
                                                    @endforeach
                                                    @endif

                                        </select>
                                        @error('piece_edit')

                                        <span class="text-danger">{{$message}}</span>
                                         @enderror
                                    </div>


                                    <div class="form-group col-md-4">

                                        <select class="form-control"  wire:model="categorie_edit">
                                                    <option value="">Selectionner une categorie</option>
                                                    @foreach($categories_edit as $category)
                                                        <option value="{{$category->id}}">{{$category->libelle}}</option>
                                                    @endforeach
                                                    @error('categorie_edit')

                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                        </select>
                                        </div>


                                        <div class="form-group col-md-4">

                                        <select class="form-control"  wire:model="sous_categorie_edit">
                                                    <option value="">Selectionner</option>

                                                    @if(!is_null($categorie_edit))
                                                    @foreach ($sous_categories_edit as $sc)
                                                        <option value="{{$sc->id}}">{{$sc->libelle}}</option>
                                                    @endforeach
                                                    @endif


                                        </select>

                                                    @error('sous_categorie_edit')

                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                        </div>
                                    </div>

                                    <button class="btn btn-lg btn-dark" wire:loading.attr="disabled" wire:loading.class="border border-dark" wire:loading.class.remove="btn-dark" wire:click='transfert'><span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-03-11-144509/theme/html/demo1/dist/../src/media/svg/icons/Files/DownloadedFile.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M14.8875071,11.8306874 L12.9310336,11.8306874 L12.9310336,9.82301606 C12.9310336,9.54687369 12.707176,9.32301606 12.4310336,9.32301606 L11.4077349,9.32301606 C11.1315925,9.32301606 10.9077349,9.54687369 10.9077349,9.82301606 L10.9077349,11.8306874 L8.9512614,11.8306874 C8.67511903,11.8306874 8.4512614,12.054545 8.4512614,12.3306874 C8.4512614,12.448999 8.49321518,12.5634776 8.56966458,12.6537723 L11.5377874,16.1594334 C11.7162223,16.3701835 12.0317191,16.3963802 12.2424692,16.2179453 C12.2635563,16.2000915 12.2831273,16.1805206 12.3009811,16.1594334 L15.2691039,12.6537723 C15.4475388,12.4430222 15.4213421,12.1275254 15.210592,11.9490905 C15.1202973,11.8726411 15.0058187,11.8306874 14.8875071,11.8306874 Z" fill="#000000"/>
                                        </g>
                                    </svg><!--end::Svg Icon--></span>
                                     Transferer
                                     <div wire:loading wire:target="transfert" >
                                     <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                     <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                     <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                    </div>
                                </button>
                                </div>
                        </div>


                        @endif


                    </div>
            </div>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->


</div>
