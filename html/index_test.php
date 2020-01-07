<html>
<head>
</head>
<body>
<table align='center'>
<form method='post' action='save.php'>
<tr>
  <td>Name</td>
    <td colspan="3"><input type='text' name="name">
    </td>
</tr>

<tr>
    <td>Style</td>
    <td>
      <select name="style[]">
        <option>Polo</option>
        <option>T-shirt</option>
        <option>Dress</option>
      </select>
    </td>
    <td>Color</td>
    <td>
      <select name="color[]">
        <option>Red</option>
        <option>Green</option>
        <option>Blue</option>
      </select>
    </td>
</tr>
    <tr>
      <td colspan='2' align='center'>
        <input type='submit' value="SAVE" name="submit"
         class="submit">
      </td>
    </tr>
  </form>
  </table>
</body>
</html>
