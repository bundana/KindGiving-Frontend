@extends('layouts.frontend.header')
@section('page-title', $campaign->name)
@section('og-description', \Illuminate\Support\Str::of(strip_tags($campaign->description))->limit(130)) 
@section('og-image', $campaign->image)

@section('content')
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url({{ asset('assets/images/page-header-bg.webp') }})">
        </div>
        <div class="overlay"></div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ url()->full() }}">Home</a></li>
                    <li><span>/</span></li>
                    <li class="active">Donate</li>
                </ul>
                <h2>Donation to {{ $campaign->name }}</h2>
            </div>
        </div>
    </section>
    <livewire:donate-page :$campaign :$organizer />
@endsection
@push('js-section')
    <script>
        // $(document).ready(function() {
        //     var inputField = $('#donation-money');

        //     inputField.on('input', function(event) {
        //         var inputValue = inputField.val();

        //         // Check if the input value contains '.00'
        //         if (!inputValue.endsWith('.00')) {
        //             // If not, set the value to '.00'
        //             inputField.val('.00');
        //         } else if (inputValue.length > 3) {
        //             // Move the cursor to the front if placed after '.00'
        //             inputField[0].setSelectionRange(0, 0);
        //         }
        //     });

        //     inputField.on('keydown', function(event) {
        //         // Prevent the user from placing the cursor after '.00'
        //         var position = inputField[0].selectionStart;
        //         if (position >= inputField.val().length - 2) {
        //             // Move the cursor to the front
        //             inputField[0].setSelectionRange(0, 0);
        //             event.preventDefault();
        //         }

        //         // Allow only digits and navigation keys
        //         if (!((event.key >= '0' && event.key <= '9') || event.key === 'ArrowLeft' || event.key ===
        //                 'ArrowRight' || event.key === 'Backspace' || event.key === 'Delete')) {
        //             event.preventDefault();
        //         }
        //     });

        //     inputField.on('focus', function() {
        //         // Set cursor position to the end
        //         inputField[0].setSelectionRange(inputField.val().length, inputField.val().length);
        //     });
        // }); 
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }
    </script>
@endpush
