async function updatePanelStats() {
    try {
        const response = await fetch("/src/auth/stats.php", {
            credentials: "same-origin"
        });

        if (!response.ok) {
            return;
        }

        const data = await response.json();

        document.getElementById("totalAccounts").textContent = data.total_accounts;
        document.getElementById("activeVisitors").textContent = data.active_visitors;
        document.getElementById("activeLoggedInUsers").textContent = data.active_logged_in_users;
    } catch (error) {
        console.error("Kunde inte hämta admin-statistik:", error);
    }
}

updatePanelStats();
setInterval(updatePanelStats, 10000); // var 10:e sek