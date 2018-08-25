<style media="screen">
    table {
        font-family: 'Unna', serif;
        font-size: 22px;
    }
</style>

<table class="table table-sm">
  <tbody>
    <tr>
      <th scope="row" class="font-bold">Birth:</th>
      <td>{{ $author->birthday }}</td>
      <td>{{ $author->getAge()}} years old</td>

    </tr>
    <tr>
      <th scope="row" class="font-bold">From:</th>
      <td colspan="2">{{ $author->birth_country }} - {{ $author->birth_city }}</td>
      <td></td>

    </tr>
    <tr>
      <th scope="row"></th>
      <td colspan="2"></td>

    </tr>
  </tbody>
</table>
