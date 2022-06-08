<h1>Voeg een nieuwe gamecontroller toe.</h1>
<form action="<?= URLROOT; ?>/gcontrollers/create" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    <label for="name">name</label>
                    <br>
                    <input type="text" name="name" id="name">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="brand">brand</label>
                    <br>
                    <input type="text" name="brand" id="brand">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="price">price</label>
                    <br>
                    <input type="number" name="price" id="price">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="partyType">party type</label>
                    <br>
                    <input type="text" name="partyType" id="partyType">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Verzenden">
                </td>
            </tr>
        </tbody>
    </table>
</form>