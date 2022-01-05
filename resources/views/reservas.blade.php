<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="assets/css/style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="assets/img/icono-hotel.png">
      </div>
      <h1>HOTEL SIANI</h1>
      <div id="company" class="clearfix">
        <div>HOTEL SIANI</div>
        <div>Colombia<br /> </div>
        <div>(602) 519-0450</div>
        <div><a href="mailto:hotelsiani@example.com">hotelsiani@example.com</a></div>
      </div>
      <div id="project">
        <div><span>Folio de Reserva</span> {{$id}}</div>
        <div><span>Cliente</span> {{$nombre}}</div>
        <div><span>Fecha de entrada</span> {{date('d-m-Y', strtotime($start))}}</div>
        <div><span>Fecha de salida</span> {{date('d-m-Y', strtotime($end))}}</div>
        <div><span>Recamara Hospedada</span> H-{{$room_id}}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">SERVICIO</th>
            <th class="desc">DESCRIPCION</th>
            <th>DIAS</th>
            <th>PRECIO</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">Renta de habitacion</td>
            <td class="desc">{{$tipo}}</td>
            <td class="unit">{{$dias}}</td>
            <td class="qty">${{$price}}</td>
            <td class="total">${{$total}}</td>
          </tr>
          
          {{-- <tr>
            <td colspan="4">TAX 25%</td>
            <td class="total">$1,300.00</td>
          </tr> --}}
          <tr>
            <td colspan="4" class="grand total">TOTAL</td>
            <td class="grand total">${{$total}}</td>
          </tr>
        </tbody>
      </table>
      {{-- <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div> --}}
    </main>
    {{-- <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer> --}}
  </body>
</html>