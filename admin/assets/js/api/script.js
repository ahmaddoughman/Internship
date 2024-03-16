document.addEventListener('DOMContentLoaded', function () {
    const eventForm = document.getElementById('eventForm');
    const formMessage = document.getElementById('formMessage');
    let eventId = 1; // Auto-incrementing event ID

    eventForm.addEventListener('submit', function (e) {
        e.preventDefault();

        // Get form values
        const eventName = document.getElementById('eventName').value;
        const eventDescription = document.getElementById('eventDescription').value;
        const eventDestination = document.getElementById('eventDestination').value;
        const eventDateFrom = document.getElementById('eventDateFrom').value;
        const eventDateTo = document.getElementById('eventDateTo').value;
        const eventCost = document.getElementById('eventCost').value;
        const eventStatus = document.getElementById('eventStatus').value;

        // Display a message
        formMessage.innerHTML = `
            Event ID: ${eventId}<br>
            Event Name: ${eventName}<br>
            Description: ${eventDescription}<br>
            Destination: ${eventDestination}<br>
            Date From: ${eventDateFrom}<br>
            Date To: ${eventDateTo}<br>
            Cost: ${eventCost}<br>
            Status: ${eventStatus}<br>
        `;

        // Increment event ID for the next event
        eventId++;

        // Optional: Clear form fields
        document.getElementById('eventName').value = '';
        document.getElementById('eventDescription').value = '';
        document.getElementById('eventDestination').value = '';
        document.getElementById('eventDateFrom').value = '';
        document.getElementById('eventDateTo').value = '';
        document.getElementById('eventCost').value = '';
        document.getElementById('eventStatus').value = 'upcoming';
    });
});
