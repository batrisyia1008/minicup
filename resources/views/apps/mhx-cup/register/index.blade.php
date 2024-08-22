@extends('layouts.master')

@section('page-title', 'Register')
@section('page-header', 'Register')
@section('description', '')

@section('content')

    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
        <li class="breadcrumb-item active">@yield('page-header')</li>
    </ol>

    <h1 class="page-header">@yield('page-header') {{--<small>header small text goes here...</small>--}}</h1>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="" data-category-load="semi-tech class a" data-bs-toggle="tab" class="nav-link px-sm-5 active">Semi-Tech Class A</a>
        </li>
        <li class="nav-item">
            <a href="" data-category-load="b-max class b" data-bs-toggle="tab" class="nav-link px-sm-5">B-Max Class B</a>
        </li>
        <li class="nav-item">
            <a href="" data-category-load="stock-car class c" data-bs-toggle="tab" class="nav-link px-sm-5">Stock-Car Class C</a>
        </li>
    </ul>
    <div class="tab-content panel p-3 rounded-0 rounded-bottom">
        <div class="tab-pane fade active show" id="default-tab-1">

             <div class="input-group mb-4">
                <div class="flex-fill position-relative">
                    <div class="input-group">
                        <div class="input-group-text position-absolute top-0 bottom-0 bg-none border-0 start-0" style="z-index: 1;">
                            <i class="fa fa-search opacity-5"></i>
                        </div>
                        <input type="text" class="form-control px-35px bg-light" placeholder="Search tickets..." id="searchInput" />
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="mhx-table table table-striped table-bordered align-middle text-nowrap mb-0">
                    <thead>
                    <tr>
                        <th width="1%">No.</th>
                        <th>Ref</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Race ID</th>
                        <th>Team Group</th>
                        <th>Registration</th>
                        <th>Total Cost (RM)</th>
                        <th width="2%">Payment</th>
                        <th>Invoices</th>
                        <th width="2%">Receipt</th>
                        <th width="1%">Approval</th>
                        <th width="1%">Redeem</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function() {
            function promptRedeemConfirmation(redeemId) {
                Swal.fire({
                    title: "Redeem Confirmation",
                    text: "Are you sure you want to redeem this item?",
                    icon: "question",
                    showDenyButton: true,
                    confirmButtonText: 'Yes, redeem it!',
                    denyButtonText: 'Cancel',
                }).then((willRedeem) => {
                    if (willRedeem.isConfirmed) {
                        $.ajax({
                            url: '{{ route('apps.mhx-cup.approveRedeem') }}',
                            method: 'POST',
                            data: {
                                _token : '{{ csrf_token() }}',
                                id     : redeemId
                            }
                        });
                    }
                });
            }

            function filterTableData(query) {
                var tableRows = $('table.mhx-table tbody tr');

                tableRows.each(function() {
                    var ref = $(this).find('td:nth-child(2)').text().toLowerCase();
                    var fullName = $(this).find('td:nth-child(3)').text().toLowerCase();
                    var email = $(this).find('td:nth-child(4)').text().toLowerCase();

                    if (ref.includes(query) || fullName.includes(query) || email.includes(query)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            $('#searchInput').on('input', function() {
                var searchTerm = $(this).val().toLowerCase();
                filterTableData(searchTerm);
            });

            function loadData(categoryLoad) {
                $.get('{{ route('apps.mhx-cup.categoryMhxCup') }}', { category: categoryLoad }, function(data) {
                    var targetTable = $('table.mhx-table tbody');
                    var urlvar = window.location.href + '/';
                    var rootUrl = '{{ url('/') }}/';

                    targetTable.empty();

                    $.each(data, function(index, item) {
                        console.log(item);
                        var tr = $('<tr>');
                        tr.append('<td>' + (index + 1) + '</td>');
                        tr.append('<td>' + item.uniq + '</td>');
                        tr.append('<td class="text-uppercase">' + item.full_name + '</td>');
                        tr.append('<td>' + item.email + '</td>');

                        var raceID = '';
                        $.each(item.number_register, function(key, number) {
                            // console.log(item.number_register);
                            raceID += number.nickname + number.register.toString().padStart(3, '0');
                            if (key !== item.number_register.length - 1 && key % 3 !== 2) {
                                raceID += ', ';
                            }
                            if (key % 3 === 2) {
                                raceID += '<br>';
                            }
                        });
                        tr.append('<td class="text-uppercase">' + raceID + '</td>');

                        tr.append('<td>' + item.team_group + '</td>');
                        tr.append('<td>' + item.registration + '</td>');
                        tr.append('<td>' + item.total_cost + '</td>');

                        var paymentType = '';
                        var paymentTypeClass = '';
                        switch (item.payment_type) {
                            case 1: // Direct Pay
                                paymentType = 'Direct',
                                paymentTypeClass = 'border-lime text-lime';
                                break;
                            case 2: // BillPlz
                                paymentType = 'BillPlz',
                                paymentTypeClass = 'border-info text-info';
                                break;
                            case 3: // Cash
                                paymentType = 'Cash',
                                paymentTypeClass = 'border-green text-green';
                                break;
                            case 4: // Cash
                                paymentType = 'FoC',
                                paymentTypeClass = 'border-indigo text-indigo';
                                break;
                            default:
                                paymentType = 'Unknown',
                                paymentTypeClass = 'border-dark text-dark';
                                break;
                        }
                        var paymentTypeBadge = '<span class="badge border ' + paymentTypeClass + ' px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center"><i class="fa fa-circle fs-9px fa-fw me-5px"></i> ' + paymentType + '</span>';

                        var paymentStatusBadgeContent = '';
                        var paymentStatusClass = '';
                        switch (item.payment_status) {
                            case 0: // unpaid
                                paymentStatusBadgeContent = 'Unpaid';
                                paymentStatusClass = 'border-danger text-danger';
                                break;
                            case 1: // paid
                                paymentStatusBadgeContent = 'Paid';
                                paymentStatusClass = 'border-success text-success';
                                break;
                            default:
                                paymentStatusBadgeContent = 'Unknown';
                                paymentStatusClass = 'border-dark text-dark';
                                break;
                        }

                        var paymentStatusBadge = '<span class="badge border ' + paymentStatusClass + ' px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center"><i class="fa fa-circle fs-9px fa-fw me-5px"></i> ' + paymentStatusBadgeContent + '</span>';

                        tr.append('<td class="text-center">' + paymentTypeBadge + ' ' + paymentStatusBadge + '</td>');

                        tr.append('<td width="1%"><a data-fancybox href="' + rootUrl + 'assets/upload/' + item.uniq + '_' + item.nickname.toUpperCase() + '.pdf' + '" class="btn btn-invoice btn-yellow btn-sm my-n1 ms-2' + (item.approval === 0 ? ' disabled' : '') + '">Invoice</a></td>');
                        tr.append('<td width="1%"><a data-fancybox href="' + rootUrl + item.receipt + '" class="btn btn-receipt btn-indigo btn-sm my-n1' + (item.receipt ? '' : ' disabled') + '">Receipt</a></td>');

                        var badgeClass = item.approval == 1 ? 'bg-primary' : 'bg-danger';
                        var approvalText = item.approval == 1 ? 'Approve' : 'Pending';
                        tr.append('<td width="1%" class="text-center"><span class="badge ' + badgeClass + '">' + approvalText + '</span> <br>' +
                            (item.approval == 0 ? '<a href="#" data-to-approve="' + item.id + '" class="btn btn-warning btn-approval btn-sm mt-1">Approve</a>' : '') + '</td>');

                        tr.find('.btn-approval').on('click', function(e) {
                            e.preventDefault();
                            const racerId = $(this).data('to-approve');
                            const approvalButton = $(this);

                            Swal.fire({
                                title: "Are you sure?",
                                text: "You are about to approve this racer.",
                                icon: "warning",
                                type: "warning",
                                showDenyButton: true,
                                confirmButtonText: 'Yes',
                                denyButtonText: 'No',
                            }).then((willApprove) => {
                                if (willApprove.isConfirmed) {
                                    const loadingIcon = $('<i class="fas fa-spinner fa-spin"></i>');
                                    approvalButton.html(loadingIcon);

                                    $.ajax({
                                        method: 'POST',
                                        url: '{{ route('apps.mhx-cup.approveRegister') }}',
                                        data: {
                                            _token : '{{ csrf_token() }}',
                                            id     : racerId
                                        },
                                        success: function(response) {
                                            if(response.status == true){
                                                Swal.fire({
                                                    title: response.title,
                                                    text: response.msg,
                                                    icon: 'success',
                                                })
                                            }
                                            approvalButton.closest('td').html('<span class="badge bg-primary">Approved</span>');
                                            tr.find('.btn-invoice').removeClass('disabled');
                                            // tr.find('.btn-receipt, .btn-invoice').removeClass('disabled');

                                            loadData(categoryLoad);
                                            console.log('Area refresh');
                                        },
                                        error: function(error) {
                                            // Handle error, e.g., show an error message
                                        }
                                    });
                                } else if (willApprove.isDenied) {
                                    Swal.fire({
                                        title: "Changes are not saved",
                                        text: "Racer have not been approved!",
                                        icon: "info",
                                        type: "info",
                                    });
                                }
                            });
                        });
                        tr.append('<td width="1%" class="text-center"><a href="#" data-to-redeem="' + item.id + '" class="btn btn-info btn-redeem btn-sm mt-1 ' + (item.redeem_status === 1 ? 'disabled':'') +'">Redeem</a></td>');

                        $('table.mhx-table tbody').on('click', '.btn-redeem', function(e) {
                            e.preventDefault();
                            var redeemId = $(this).data('to-redeem');

                            if (item.redeem_status !== 0) {
                                // If redeem status is 0, prompt confirmation
                                promptRedeemConfirmation(redeemId);
                            } else {
                                // If redeem status is 1, button is disabled
                                Swal.fire({
                                    title: "Already Redeemed",
                                    text: "This item has already been redeemed.",
                                    icon: "info",
                                    type: "info",
                                });
                            }
                        });

                        {{--tr.append('<td>' +--}}
                        {{--    '@can('mhx-cup-show')<a href="' + urlvar + item.id + '" class="btn btn-sm btn-info btn-sm my-n1"><i class="fas fa-eye"></i></a> @endcan' +--}}
                        {{--    '@can('mhx-cup-edit')<a href="' + urlvar + item.id + '/edit' + '" class="btn btn-sm btn-primary btn-sm my-n1"><i class="fas fa-pencil-alt"></i></a> @endcan' +--}}
                        {{--    '@can('mhx-cup-delete') <a href="' + urlvar + 'destroy/' + item.id + '" class="btn btn-sm btn-danger btn-sm my-n1" data-confirm-delete="true"><i class="fas fa-trash-alt"></i></a> @endcan' +--}}
                        {{--    '</td>');--}}

                        targetTable.append(tr);
                    });
                });
            }

            loadData($('ul.nav-tabs .nav-link.active').data('category-load'));

            $('ul.nav-tabs a').on('click', function(e) {
                e.preventDefault();
                var categoryLoad = $(this).data('category-load');
                loadData(categoryLoad);
            });

        });
    </script>
@endpush
