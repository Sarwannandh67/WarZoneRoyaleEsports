document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('registrationForm');
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        alert('Registration submitted successfully!');
        form.reset();
    });
});

const form = document.getElementById("registrationForm");
    const previewModal = document.getElementById("previewModal");
    const previewData = document.getElementById("previewData");
    const confirmSubmit = document.getElementById("confirmSubmit");
    const cancelSubmit = document.getElementById("cancelSubmit");
    const submitButton = form.querySelector("button[type='submit']");
    const loadingSpinner = document.querySelector(".loading-spinner");

    // Replace this URL with your Google Apps Script web app URL
    const SCRIPT_URL = 'YOUR_GOOGLE_APPS_SCRIPT_WEB_APP_URL';
    
    function showLoading() {
        submitButton.disabled = true;
        loadingSpinner.style.display = "block";
        submitButton.textContent = "Processing...";
    }

    function hideLoading() {
        submitButton.disabled = false;
        loadingSpinner.style.display = "none";
        submitButton.textContent = "Register";
    }

    function createPreviewTable(formData) {
        const table = document.createElement('table');
        table.className = 'preview-table';
        
        Object.entries(formData).forEach(([key, value]) => {
            const row = table.insertRow();
            const labelCell = row.insertCell();
            const valueCell = row.insertCell();
            
            labelCell.textContent = key
                .replace(/([A-Z])/g, ' $1')
                .replace(/^./, str => str.toUpperCase())
                .replace('UID', 'UID')
                .replace('WA', 'WhatsApp');
            
            valueCell.textContent = value;
        });
        
        return table;
    }

    form.addEventListener("submit", function(event) {
        event.preventDefault();
        
        const formData = {
            timestamp: new Date().toISOString(),
            teamName: document.getElementById("teamName").value,
            leaderName: document.getElementById("leaderName").value,
            leaderWA: document.getElementById("leaderWA").value,
            email: document.getElementById("email").value,
            leaderUID: document.getElementById("leaderUID").value,
            player2UID: document.getElementById("player2UID").value,
            player3UID: document.getElementById("player3UID").value,
            player4UID: document.getElementById("player4UID").value,
            previousParticipation: document.getElementById("previousParticipation").value,
            agreeRules: document.getElementById("agreeRules").value,
            agreeFairPlay: document.getElementById("agreeFairPlay").value,
            joinedPlatforms: document.getElementById("joinedPlatforms").value,
            agreeTerms: document.getElementById("agreeTerms").value
        };

        previewData.innerHTML = '';
        previewData.appendChild(createPreviewTable(formData));
        previewModal.style.display = "block";
    });

    cancelSubmit.addEventListener("click", function() {
        previewModal.style.display = "none";
    });

    confirmSubmit.addEventListener("click", async function() {
        showLoading();
        previewModal.style.display = "none";

        const formData = {
            timestamp: new Date().toISOString(),
            teamName: document.getElementById("teamName").value,
            leaderName: document.getElementById("leaderName").value,
            leaderWA: document.getElementById("leaderWA").value,
            email: document.getElementById("email").value,
            leaderUID: document.getElementById("leaderUID").value,
            player2UID: document.getElementById("player2UID").value,
            player3UID: document.getElementById("player3UID").value,
            player4UID: document.getElementById("player4UID").value,
            previousParticipation: document.getElementById("previousParticipation").value,
            agreeRules: document.getElementById("agreeRules").value,
            agreeFairPlay: document.getElementById("agreeFairPlay").value,
            joinedPlatforms: document.getElementById("joinedPlatforms").value,
            agreeTerms: document.getElementById("agreeTerms").value
        };

        try {
            const response = await fetch(SCRIPT_URL, {
                method: 'POST',
                mode: 'no-cors',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            });

            // Show success message
            document.getElementById("successMessage").style.display = "block";
            form.reset();

            // Hide success message after 5 seconds
            setTimeout(() => {
                document.getElementById("successMessage").style.display = "none";
            }, 5000);

        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred while submitting the form. Please try again.');
        } finally {
            hideLoading();
        }
    });