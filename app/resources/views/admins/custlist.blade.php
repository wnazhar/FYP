@extends('admins.homepage')

@section('content')
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#0ed3cf">
    <meta name="msapplication-TileColor" content="#0ed3cf">
    <meta name="theme-color" content="#0ed3cf">

    <meta property="og:image" content="https://tailwindcomponents.com/storage/2532/temp57754.png?v=2021-06-13 17:58:49" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="640" />
    <meta property="og:image:type" content="image/png" />

    <meta property="og:url" content="https://tailwindcomponents.com/component/projects-table/landing" />
    <meta property="og:title" content="Projects table by Gleb Varganov" />
    <meta property="og:description" content="Projects table component" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@TwComponents" />
    <meta name="twitter:title" content="Projects table by Gleb Varganov" />
    <meta name="twitter:description" content="Projects table component" />
    <meta name="twitter:image" content="https://tailwindcomponents.com/storage/2532/temp57754.png?v=2021-06-13 17:58:49" />

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.0.2/dist/tailwind.min.css">
</head>
<style> 
@import url('https://fonts.googleapis.com/css?family=Roboto:300');
  
    .font span{
    font-size: 80px; 
    font-family: 'Roboto', sans-serif;
}

</style>
<body class="bg-gray-200">

<div class="text-center">
                <h1 class="font">
                    <span >Customer </span>
                    <span class="text-blue tracking-wide">List</span>
                </h1> 
            </div>    

    <div class="overflow-x-auto">
    
        <div class="min-w-screen min-h-screen bg-gray-100 flex justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-blue-100 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-center">UserName</th>
                                <th class="py-3 px-6 text-left">Name </th>
                                <th class="py-3 px-6 text-center">Phone Number </th>
                                <th class="py-3 px-6 text-center">Email</th>
                            </tr>
                        </thead>
                    @foreach($users as $users)
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                
                                <td class="py-3 px-6 text-center">
                                <a href="{{route('admins.record', ['custId' => $users->custId])}}">
                                    <div class="flex items-center justify-center">
                                    <div class="transform hover:scale-150">
                                        <span>{{$users->custUserName}}</span>
                                    </div>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="font-medium">{{$users->custFullName}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <span>{{$users->custPhoneNo}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <span>{{$users->email}}</span>
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    @endforeach
                    </table>
                
                </div>
               
            </div>
            
        </div>
    
    </div>
</body>
</html>
@endsection
