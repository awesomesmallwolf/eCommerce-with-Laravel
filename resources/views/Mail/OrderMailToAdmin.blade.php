<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <table class="table">
    <tr> 
    <th>User Info <br></th>
    <td><br>{{$userid}} </td>
    </tr>
   <tr>
       <th>Order Amount</th>
       <td>{{$amount}}</td>
   </tr>
   <tr>
       <th>payment_status</th>
       <td>{{$payment_status}}</td>
   </tr>
   <tr>
       <th>transaction_id</th>
       <td>{{$transaction_id}}</td>
   </tr>
   <tr>
       <th>coupon_used</th>
       <td>{{$coupon_used}}</td>
   </tr>
   
  </tbody>
</table>

</body>
</html>