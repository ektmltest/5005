<x-mail::message>
# A customer try to reach us!

## His/Her data:
<table border="0">
    <tr>
        <th style="text-align: left; padding-right: 5px;">Name:</th>
        <td>{{$data['name'] ?? 'Null'}}</td>
    </tr>
    <tr>
        <th style="text-align: left; padding-right: 5px;">Phone:</th>
        <td>{{$data['phone'] ?? 'Null'}}</td>
    </tr>
    <tr>
        <th style="text-align: left; padding-right: 5px;">Email:</th>
        <td>{{$data['email'] ?? 'Null'}}</td>
    </tr>
    <tr>
        <th style="text-align: left; padding-right: 5px;">Message:</th>
        <td>{{$data['message'] ?? 'Null'}}</td>
    </tr>
</table>

<br>
{{ config('app.name') }}
</x-mail::message>
