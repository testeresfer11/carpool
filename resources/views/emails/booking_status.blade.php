<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ride-with-jone</title>
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
            box-sizing: border-box;
            background: #fff;
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
            height: 100%;
            background: #ddd;
            position: absolute;
            top: 10px;
            left: 4px;
            z-index: -1;
        }

        .melb-text {
            position: relative;
            padding-bottom: 20px;
        }

        .green-circle span {
            background: #7dbf43;
            display: block;
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }
        .rounded-circle {
            border-radius: 50px;
        }
        .michael-text {
            display: flex;
            gap: 100px;
            align-items: center;
        }
        .social-icon-img{
            width: 25px;
        }
          table {
    border-spacing: 0;
  }
    </style>
</head>

<body>
    <div class="welcome-email">
        <div class="container" style="max-width: 500px; margin:0 auto">
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th style="font-size: 42px;color: #7dbf43;text-align: left;font-weight: 600;">Drivvy</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="margin-top: 20px; display: block;">
                        <td>
                            <h1 style=" max-width:522px;color: #231f20; font-weight: 600;">Your booking request has been rejected</h1></h1>
                        </td>
                    </tr>
                     <tr style="margin-top: 20px; display: block;">
                        <td>
                            <p style="font-size: 18px; color: #808080;"> Unfortunately, your booking request has been rejected.</p>
                             <p style="font-size: 18px; color: #808080;"> Hurry upand book a new ride on app.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="font-size: 18px; color: #808080;">    {{ \Carbon\Carbon::parse($ride->departure_time)->format('l, d F Y') }}
</p>
                        </td>
                    </tr>
                     <!-- First Location -->
                            <tr>
                                <td style="padding: 0px 0; text-align: left;">
                                    <table role="presentation" style="width: 100%; border-collapse: collapse;">
                                        <tr>
                                            <td style="width: 20px; text-align: center; vertical-align: top;">
                                                <!-- Circle -->
                                                <div style="width: 10px; height: 10px; border: 2px solid #ddd; border-radius: 50%; background-color: #fff; margin: 0 auto;"></div>
                                                <!-- Line -->
                                                <div style="width: 2px; height: 80px; background-color: #ddd; margin: 0 auto;"></div>
                                            </td>
                                            <td style="padding-left: 10px;vertical-align: top;">
                                                <span style="margin: 0; color: #666666; font-size: 18px; font-weight: 600;">{{ $ride->departure_city }}</span>
                                                <br>
                                                <span style="font-size: 12px; color: #888;">{{ $booking->departure_location }}</span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                                <!-- Second Location -->
                                <tr>
                                    <td style="padding: 0px 0; text-align: left;">
                                        <table role="presentation" style="width: 100%; border-collapse: collapse;">
                                            <tr>
                                                <td style="width: 20px; text-align: center; vertical-align: top;">
                                                    

                                                    <!-- Circle -->
                                                    <div style="width: 10px; height: 10px; border: 2px solid #ddd; border-radius: 50%; background-color: #fff; margin: 0 auto;"></div>
                                                    <!-- Line -->
                                                    <div style="width: 2px; height: 100%; background-color: #ddd; margin: 0 auto;"></div>
                                                </td>

                                                <td style="padding-left: 10px;vertical-align: top;">
                                                    <span style="margin: 0; color: #666666; font-size: 18px; font-weight: 600;">{{ $ride->arrival_city }}</span>
                                                    <br>
                                                    <span style="font-size: 12px; color: #888;">{{ $booking->arrival_location }}</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                             <tr>
                                <td style="padding-top:25px;padding-bottom:25px;">
                                    <span style=" color: #666666;font-size: 18px;font-weight: 600;">{{ $user->first_name }}</span>
                                    <span style="padding-left: 100px;vertical-align: middle;"><img
                                            src="{{ $user->profile_picture ? url('/storage/users/' . $user->profile_picture) : asset('/admin/images/user-image.webp') }}" alt="profile" style="width:60px;height: 60px; border-radius: 50%;"></span>
                                </td>

                            </tr>
                            <tr>
                  
                     <table style="width: 100%;">
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
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>