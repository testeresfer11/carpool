<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ride</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Outfit", sans-serif;
        }

        .circle {
            width: 10px;
            height: 10px;
            display: block;
            border-radius: 50%;
            border: 2px solid #ddd;
        }

        .melb-text,
        .charle-text {
            display: flex;
            gap: 15px;
            align-items: baseline;
        }

        .melb-text span.circle:after {
            content: "";
            width: 2px;
            height: 63px;
            background: #ddd;
            position: absolute;
            top: 10px;
            left: 4px;
        }

        .melb-text span.circle {
            position: relative;
        }

        .green-circle span {
            background: #7dbf43;
            display: block;
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }

        .michael-text {
            display: flex;
            gap: 100px;
            align-items: center;
        }

        .rounded-circle {
            border-radius: 50%;
        }

        .driverDetail {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 70%;
        }
    </style>
</head>

<body>
    <div class="welcome-email">
        <div class="container" style="max-width: 500px; margin:0 auto">
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th style="font-size: 42px; color: #7dbf43; text-align: left; font-weight: 600;">Drivvy</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="margin-top: 20px; display: block;">
                        <td>
                            <h1 style="color: #231f20; font-weight: 600;">How was your ride with {{$driver->first_name}}?</h1>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="font-size: 18px; color: #808080;">Please, rate your ride with {{$driver->first_name}} and leave a review.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top:25px; padding-bottom:25px;">
                            <span style="color: #666666; font-size: 18px; font-weight: 600;">{{$driver->first_name}}</span>
                            <span style="padding-left: 100px; vertical-align: middle;">
                                <img src="{{ $driver->profile_picture ? url('/storage/users/' . $driver->profile_picture) : asset('/admin/images/user-image.webp') }}" 
                                alt="User profile picture" style="width: 60px; height: 60px;border-radius: 50%;">
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="font-size: 18px; color: #808080;">Open the Drivvy app, select your ride, and<br>
                                scroll to the bottom to find the <span style="font-weight: 600;">Rate the Ride</span> feature.
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table style="width:100%;">
                 <tr>
                    <td style="text-align: center;">
                        <h2 style="font-weight: 600; color: #231f20; border-top: 1px solid #231f20; padding-top: 60px; padding-bottom: 0px;">Ready to Drivvy?</h2>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center; padding-bottom: 20px;">
                            <div class="copy-right">
                                <span><a href="#" target="_blank" aria-label="Facebook" style="text-decoration: none;">
                                    <img src="{{ asset('admin/images/app.png') }}" alt="Facebook" style="width:135px;" />
                                </a></span>
                                <span><a href="#" target="_blank" aria-label="Facebook" style="text-decoration: none; padding-left: 10px;">
                                    <img src="{{ asset('admin/images/google.png') }}" alt="Facebook" style="width:135px;" />
                                </a></span>
                            </div>
                        </td>
                </tr>
                <tr>
                    <td style="text-align:center;">
                        <div class="copy-right">
                            <span style="vertical-align: middle; padding-right: 5px; font-size:19px; color: #808080;">&#169;</span>
                            <span style="color:#808080;">2024 Drivvy</span>
                        </div>
                    </td>
                </tr>
                
                <tr>
                    <td style="text-align: center; padding-top: 15px; padding-bottom: 15px;">
                        <a href="https://www.facebook.com/share/KuefSgBKeuRDRCtn/" target="_blank" aria-label="Facebook" style="text-decoration: none;">
                            <img src="{{ asset('admin/images/Facebook_Icon.png') }}" alt="Facebook" style="width:25px;" />
                        </a>
                        <a href="https://www.instagram.com/drivvy.australia?igsh=aGN5YmgzbjAwYmZq&utm_source=qr" target="_blank" aria-label="Instagram" style="text-decoration: none;">
                            <img src="{{ asset('admin/images/Instagram_Icon.png') }}" alt="Instagram" style="padding: 0 7px; width:25px" />
                        </a>
                        <a href="linkedin.com/in/drivvy-australia" target="_blank" aria-label="LinkedIn" style="text-decoration: none;">
                            <img src="{{ asset('admin/images/LinkedIn_Icon.png') }}" alt="LinkedIn" style="width:25px;" />
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
