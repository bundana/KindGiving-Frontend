@push('css-section')
    <style>


        .lazy-container {
            display: flex;
            border: 1px solid #eaecef;
            height: 200px;
            padding: 1%;
            background-color: white;
        }

        .img-container {
            width: 15%;
            padding: 20px;
        }


        .content {
            border: 1px solid white;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            padding: 20px;
            justify-content: space-between;
        }

        .stripe {
            border: 1px solid white;
            height: 20%;
            background-color: #babbbc;
        }

        .small-stripe {
            width: 40%;
        }

        .medium-stripe {
            width: 70%;
        }

        .long-stripe {
            width: 100%;
        }

        .container-lazy.loading .img, .container-lazy.loading .stripe {
            animation: hintloading 2s ease-in-out 0s infinite reverse;
            -webkit-animation: hintloading 2s ease-in-out 0s infinite reverse;
        }

        @keyframes hintloading {
            0% {
                opacity: 0.5;
            }
            50% {
                opacity: 1;
            }
            100% {
                opacity: 0.5;
            }
        }

        @-webkit-keyframes hintloading {
            0% {
                opacity: 0.5;
            }
            50% {
                opacity: 1;
            }
            100% {
                opacity: 0.5;
            }
        }

        .cards {
            display: flex;
        }

        .card-lazy {
            margin: 10px;
            width: 300px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);

            .image {
                img {
                    max-width: 100%;
                    border-top-left-radius: 5px;
                    border-top-right-radius: 5px;
                }
            }

            .content {
                padding: 20px 30px;
            }
        }

        .card.is-loading {
            .image,
            h2,
            p {
                background: #eee;
                background: linear-gradient(110deg, #ececec 8%, #f5f5f5 18%, #ececec 33%);
                border-radius: 5px;
                background-size: 200% 100%;
                animation: 1.5s shine linear infinite;
            }

            .image {
                height: 200px;
                border-bottom-left-radius: 0;
                border-bottom-right-radius: 0;
            }


        }

        @keyframes shine {
            to {
                background-position-x: -200%;
            }
        }


        .container-lazy {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 1.5rem;
        }

        .container-lazy .card {
            /*background-color: #fff;*/
            height: auto;
            width: auto;
            overflow: hidden;
            /*margin: 12px;*/
            border-radius: 3px;
        }

        .container-lazy .card-image img {
            width: 100%;
            height: 100%;
        }

        .container-lazy .card-image.loading {
            height: 300px;
            width: 400px;
            border-radius: 3px;
        }


        .container-lazy .card-chart img {
            width: 100%;
            height: 100%;
        }

        .container-lazy .card-chart.loading {
            height: 300px;
            width: 300px;
            border-radius: 50%;
        }

        .container-lazy .card-title {
            padding: 8px;
            font-size: 22px;
            font-weight: 700;
        }

        .container-lazy .card-title.loading {
            height: 1rem;
            margin: 1rem;
            border-radius: 3px;
            width: 85%;
        }

        .container-lazy .card-title.loading.shorter-m {
            width: 50%;
        }

        .container-lazy .card-title.loading.shorter-s {
            width: 25%;
        }

        .container-lazy .card-description {
            padding: 8px;
            font-size: 16px;
        }

        .container-lazy .card-description.loading {
            height: 2rem;
            border-radius: 3px;
        }

        .loading {
            position: relative;
            background-color: #f5f5f5;
            overflow: hidden;
        }

        .loading::after {
            display: block;
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            transform: translateX(-100%);
            animation: 2s loading linear 0.5s infinite;
            background: linear-gradient(90deg, transparent, #ededed, transparent);
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
            transform: translateX(-100%);
            z-index: 1;
        }

        @keyframes loading {
            0% {
                transform: translateX(-100%);
            }
            60% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(100%);
            }
        }


        .container-lazy .table {
            background-color: #fff;
            height: auto;
            width: 60%;
            overflow: hidden;
            margin: 12px;
            border-radius: 3px;
            box-shadow: 9px 17px 45px -29px rgba(0, 0, 0, 0.44);
        }

        .container-lazy .table-content {
            padding: 8px;
            font-size: 22px;
            font-weight: 700;
        }

        .container-lazy .table-content.loading {
            height: 1rem;
            margin: 1rem;
            border-radius: 3px;
            width: 92%;
        }
    </style>
@endpush

<div class="container-lazy">
<<<<<<< HEAD
    <div class="card" style="margin: 20px">
        <div class="card-image loading"></div>
        <div class="loading card-title"></div>
        <div class="loading card-title"></div>
        <div class="loading card-title"></div>
        <div class="loading card-description"></div>
    </div>
    <div class="card" style="margin: 20px">
        <div class="card-image loading"></div>
        <div class="loading card-title"></div>
        <div class="loading card-title"></div>
        <div class="loading card-title"></div>
        <div class="loading card-description"></div>
    </div>
    <div class="card" style="margin: 30px">
=======
    <div class="card">
>>>>>>> e8b001f856097370f7b723f3df15c443bf164b72
        <div class="card-image loading"></div>
        <div class="loading card-title"></div>
        <div class="loading card-title"></div>
        <div class="loading card-title"></div>
        <div class="loading card-description"></div>
    </div>

    {{--    <div class="card">--}}
    {{--        <div class="loading card-title"></div>--}}
    {{--        <div class="loading card-title shorter-m"></div>--}}
    {{--        <div class="loading card-title shorter-s"></div>--}}
    {{--        <div class="card-chart loading"></div>--}}
    {{--        <div class="loading card-title shorter-m"></div>--}}
    {{--        <div class="loading card-title"></div>--}}
    {{--    </div>--}}

    {{--    <div class="table">--}}
    {{--        <div class="loading card-title shorter-s"></div>--}}
    {{--        <div class="loading table-content"></div>--}}
    {{--        <div class="loading table-content"></div>--}}
    {{--        <div class="loading table-content"></div>--}}
    {{--        <div class="loading table-content"></div>--}}
    {{--    </div>--}}
</div>

