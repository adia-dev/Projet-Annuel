<?php include 'includes/header.php'; ?>



<main>

    <section class="form-container">

        <div class="form-card">

            <h1>Favorite Sport</h1>

        </div>

        <div class="form-card">
            <form class="form-inputs" action="signup_check.php" method="POST">

                <input type="text" name="firstname" placeholder="Nom...">
                <input type="text" name="lastname" placeholder="Prénom...">
                <input type="number" name="age" placeholder="Age...">
                <input type="text" name="email" placeholder="Email...">
                <input type="password" name="pwd" placeholder="Mot de passe...">
                <input type="password" name="pwdrepeat" placeholder="Répéter le mot de passe...">
                <button type="submit" name="submit">S'inscrire</button>
            </form>

        </div>
    </section>


</main>






<?php include 'includes/footer.php'; ?>