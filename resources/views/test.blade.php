<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Laravel Bootstrap Typeahead Autocomplete Search from Database</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  


</head>
<body>
<div class="container">



<h1>THIS IS TEST {{Auth::user()->role->name}}</h1>

{{-- 
    @ if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif    
    @yield('content')
</div>
<script type="text/javascript">
  $('#keyword').typeahead(null, {
            name: 'query',
            displayKey: 'value',
            source: autosuggest.ttAdapter(),
            templates: {
                empty: [
                    '<div class="empty-message">',
                    'Unable to find any suggestion for your query',
                    '</div>'
                ].join('\n'),
                suggestion: Handlebars.compile('<div>@{{value}}<br><span>@{{data}}</div>')
            }
        }).on('typeahead:selected', function (obj, datum) {
            window.location.href = datum.href;
        });</script>
 --}}

</body>
</html>