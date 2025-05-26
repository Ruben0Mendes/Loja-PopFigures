<?php include_once "header.php"; ?>


<section id="home">
        <h1>ENTRA EM CONTATO</h1>
        <img src="images/Banner.jpg" alt="Pop Figures Banner">
        <p>Descobre a nossa coleção exclusiva de Pop Figures!</p>
    </section>

<section id="contato">
        <h2>Deixa a tua Questão</h2>
        <form id="contactForm">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="Data">Data:</label>
            <input type="datetime-local" id="Data" name="Data">

            <label for="mensagem">Mensagem:</label>
            <textarea id="mensagem" name="mensagem" required></textarea>

            <button type="submit">Enviar</button>
        </form>
        <p id="formMessage"></p>
    </section>

<?php include_once "footer.php"; ?>