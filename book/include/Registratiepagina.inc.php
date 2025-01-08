<div class="wrapper">
    <form action="php/reg.php" method="post">
        <h1>regisreren</h1>


        <div class="inputfield">
            <input type="text" name="naam"
                   placeholder="naam" required>
            <i class='bx bx-user'></i>
            <div class="input-field">
                <input type="text" name="tussenvoegsel"
                       placeholder="tussenvoegsel" >
                <i class='bx bx-user'></i>
                <input type="text" name="achternaam"
                       placeholder="achternaam" required >
                <i class='bx bx-user'></i>
                <input type="text" name="woonplaats"
                       placeholder="woonplaats" required >
                <i class='bx bxs-home'></i>
                <input type="text" name="straatnaam"
                       placeholder="straat" required >
                <i class='bx bxs-home'></i>
                <input type="number" name="huisnummer"
                       placeholder="huisnummer" required >
                <i class='bx bxs-home'></i>
                <input type="text" name="postcode"
                       placeholder="postcode" required >
                <i class='bx bxs-home'></i>
                <input type="date" name="date"
                       placeholder="geboortedatum" required >
                <i class='bx bx-child'></i>
                <input type="email" name="email"
                       placeholder="email" required>
                <i class='bx bxl-gmail'></i>
                <input type="number" name="telefoonnummer"
                       placeholder="telefoon-nummer" required>
                <i class='bx bx-phone'></i>
                <input type="password" name="wachtwoord"
                       placeholder="wachtwoord" required>
                <i class='bx bx-lock-alt' ></i>
                <div class="input-field">
                    <button type="submit" class="btn2">login </button>
                    <label for="Role">role:</label>
                    <select name="role">
                        <option type="hidden" value="User">User</option>
                    </select>
                </div>
            </div>
        </div>
    </form>