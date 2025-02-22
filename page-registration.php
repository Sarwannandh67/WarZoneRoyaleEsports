<?php
/*
Template Name: Esports Registration
*/
get_header(); 
?>

<main class="container">
    <div class="card">
        <h1>Esports Tournament Registration</h1>
        <form id="registrationForm">
            <div class="form-section">
                <h2 class="section-title">Team Information</h2>
                <div class="form-group">
                    <label for="teamName" class="required">Team Name</label>
                    <input type="text" id="teamName" required>
                </div>
                <div class="form-group">
                    <label for="leaderName" class="required">Team Leader Name</label>
                    <input type="text" id="leaderName" required>
                </div>
                <div class="form-group">
                    <label for="leaderWA" class="required">Team Leader WhatsApp Number</label>
                    <input type="tel" id="leaderWA" required>
                </div>
                <div class="form-group">
                    <label for="email" class="required">Valid Email</label>
                    <input type="email" id="email" required>
                </div>
            </div>

            <button type="submit">
                Register
                <div class="loading-spinner"></div>
            </button>
        </form>
    </div>
</main>

<?php get_footer(); ?>
