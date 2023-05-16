@extends('frontend.pages.company')

@section('title', __('labels.company.register_tab_title'))

@section('tabcontent')
    {{-- {{ __('labels.register.heading_title') . ' ' . $company->company_name }} --}}


    {{-- <div class="tab-pane-defeated " id="handelsregister" role="tabpanel" aria-labelledby="register-tab">
        <div class="row justify-content-center">

            @isset($company->publications)
                @foreach($company->publications as $publication)

                    <div class="col-md-10">
                        <div class="card mb-4 handlecard">
                            <div class='table-responsive expandable' id='expandTable'>
                                <table class='table table-row-bordered align-middle mb-0 responsiveTable'>
                                    <thead>
                                    <tr class='text-muted fw-500'>
                                        <th class='min-w-100px p-3 fw-500' style="width:40%;">SOGC</th>
                                        <th class='min-w-100px p-3 fw-500' style="width:30%;">Daily</th>
                                        <th class='min-w-100px p-3 fw-500' style="width:20%;">Mutation </th>
                                        <th class="fw-500 p-3" style="width:10%;">Type</th>
                                    </tr>
                                    </thead>
                                    <tbody class="border-top border-light">
                                    <tr data-bs-toggle='collapse' data-bs-target='.row-collapse' aria-controls='rowCollapse' class='cursor-pointer handletr' aria-expanded="true">
                                        <td data-label='SOGC'>
                                            NO {{$publication->sogcId}} from {{$publication->sogcDate}}
                                        </td>
                                        <td data-label='Daily'>
                                            NO <?php echo $publication->registryOfCommerceJournalId; ?>
                                            from <?php echo $publication->registryOfCommerceJournalDate; ?>
                                        </td>
                                        <td data-label='Mutation'>
                                                <?php
                                                foreach ( $publication->mutationTypes as $index => $mutation ) :
                                                    echo $mutation->key;
                                                    if ( $index < sizeof ( $publication->mutationTypes ) - 1 )
                                                        echo ",";
                                                endforeach;
                                                ?>
                                        </td>
                                        <td data-label='Type'>
                                            <button class="btn btn-sm btn-theme">View</button>
                                        </td>
                                    </tr>
                                    <tr class='expandable-row'>
                                        <td class='reset-expansion-style' colSpan='4'>
                                            <div class='row-expansion-style collapse row-collapse collapsible rowCollapse show' data-bs-parent='#expandTable'>
                                                <div class="py-4 px-3 text-start">
                                                        <?php echo $publication->message; ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                @endforeach
            @endisset

        </div>
    </div> --}}

    <div class="tab-pane-defeated " id="handelsregister" role="tabpanel" aria-labelledby="register-tab">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mb-4 handlecard">
                    <div class='table-responsive expandable' id='expandTable'>
                        <table class='table table-row-bordered align-middle mb-0 responsiveTable'>
                            <thead>
                            <tr class='text-muted fw-500'>
                                <th class='min-w-100px p-3 fw-500' style="width:40%;">SOGC</th>
                                <th class='min-w-100px p-3 fw-500' style="width:30%;">Daily</th>
                                <th class='min-w-100px p-3 fw-500' style="width:20%;">Mutation </th>
                                <th class="fw-500 p-3" style="width:10%;">Type</th>
                            </tr>
                            </thead>
                            <tbody class="border-top border-light">
                            @isset($company->publications)
                                @foreach($company->publications as $key => $publication)
                                    <tr data-bs-toggle='collapse' data-bs-target='.row-collapse-{{ $publication->sogcId }}' aria-controls='rowCollapse' class='cursor-pointer handletr' aria-expanded="true">
                                        <td data-label='SOGC'>
                                            {{ $publication->registryOfCommerceJournalId }}
                                        </td>
                                        <td data-label='Daily'>
                                            {{ $publication->registryOfCommerceJournalDate }}
                                        </td>
                                        <td data-label='Mutation'>
                                            @foreach ( $publication->mutationTypes as $index => $mutation ) :
                                            {{ $mutation->key}}
                                            @if ( $index < sizeof ( $publication->mutationTypes ) - 1 )
                                                {{ "," }}
                                            @endif
                                            @endforeach;
                                        </td>
                                        <td data-label='Type'>
                                            <button class="btn btn-sm btn-theme">{{ __('View') }}</button>
                                        </td>
                                    </tr>
                                    <tr class='expandable-row'>
                                        <td class='reset-expansion-style' colSpan='4'>
                                            <div class='row-expansion-style collapse row-collapse-{{ $publication->sogcId }} collapsible rowCollapse {{ $key == 0 ? 'show' : '' }}' data-bs-parent='#expandTable'>
                                                <div class="py-4 px-3 text-start">
                                                    {{ $publication->message }}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
