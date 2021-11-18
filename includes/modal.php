<div id="confirmationModal">
    <a class="close-icon backToForm">
        <div class="close btn-line"></div>
        <div class="close btn-line"></div>
    </a>

    <div class="form-title">Reservation Request</div>
    <small>Please check the information and confirm</small>
    <form name="confirmationForm" class="confirmation-container" method="post" action="#">
        <div>
            <p class="date-label">Reservation Date</p>
            <div class="confirmation-details date">
                <input type="date" class="typed-infos" id="selectedDate" name="date" readonly>
                <input type="time" class="typed-infos" id="selectedTime" name="time" readonly>
            </div>
        </div>
        <div>
            <p class="date-label">Number of Seats</p>
            <div class="confirmation-details">
                <input type="number" class="typed-infos" name="seats" id="selectedSeats" readonly>
            </div>
        </div>
        <div class="confirmation-details">
            <label class="input-label">Name</label>
            <input type="text" id="typedName" class="typed-infos" name="name" readonly>
        </div>
        <div class="confirmation-details">
            <label class="input-label">Emai</label>
            <input type="email" name="email" id="typedEmail" class="typed-infos" readonly>
        </div>
        <div class="confirmation-details">
            <label class="input-label">Phone</label>
            <input type="tel" name="phone" id="typedPhone" class="typed-infos" readonly>
        </div>
        <div class="confirmation-details comment">
            <label class="textarea-label">Comment</label>
            <textarea name="comment" id="typedComment" class="typed-infos" name="comment" readonly></textarea>
        </div>
        <div class="btn-container">
            <a type="button" class="btn backToForm" href="#reserve">Back</a>
            <input type="submit" class="btn" id="sendBtn" name="sendRequest" value="Send">
        </div> 
    </form>
</div>

