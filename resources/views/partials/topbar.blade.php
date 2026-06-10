<!-- ===== TOP BAR ===== -->
<div class="top-bar">
    <div class="container">
        <div class="top-bar-left">
            <a href="tel:+923000311868"><i class="fas fa-phone-alt"></i> +92-300-0311868</a>
            <a href="mailto:contact@aksitglobal.com"><i class="fas fa-envelope"></i> contact@aksitglobal.com</a>
            <span><i class="fas fa-clock"></i> Mon – Sat: 9:00 AM – 7:00 PM</span>
        </div>
        <div class="top-bar-right">
            <a href="https://www.linkedin.com/company/aksitglobalservices" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://www.facebook.com/Aksitglobalservices" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/aksitglobal" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="https://www.youtube.com/@aksitglobal" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
            <a href="https://twitter.com/aksitglobal" target="_blank" title="X (Twitter)"><i class="fab fa-x-twitter"></i></a>
            <a href="https://www.tiktok.com/@aksitglobal" target="_blank" title="TikTok"><i class="fab fa-tiktok"></i></a>

            {{-- Book a Free Meeting Button --}}
            <button
                type="button"
                data-bs-toggle="modal"
                data-bs-target="#bookMeetingModal"
                style="
                    background: linear-gradient(135deg, #f59e0b, #d97706);
                    color: #111;
                    border: none;
                    border-radius: 6px;
                    padding: 5px 14px;
                    font-size: 12.5px;
                    font-weight: 700;
                    cursor: pointer;
                    letter-spacing: 0.3px;
                    display: inline-flex;
                    align-items: center;
                    gap: 5px;
                    margin-left: 10px;
                    white-space: nowrap;
                    box-shadow: 0 2px 8px rgba(245,158,11,0.35);
                    transition: transform 0.15s, box-shadow 0.15s;
                "
                onmouseover="this.style.transform='translateY(-1px)';this.style.boxShadow='0 4px 14px rgba(245,158,11,0.5)'"
                onmouseout="this.style.transform='';this.style.boxShadow='0 2px 8px rgba(245,158,11,0.35)'"
            >
                📅 Book a Free Meeting
            </button>
        </div>
    </div>
</div>

{{-- ===== BOOK A FREE MEETING MODAL ===== --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="modal fade" id="bookMeetingModal" tabindex="-1" aria-labelledby="bookMeetingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="border-radius: 12px; overflow: hidden;">
            <div class="modal-header text-white" style="background: linear-gradient(135deg, #1a1a2e, #16213e);">
                <h5 class="modal-title" id="bookMeetingModalLabel">
                    📅 Book a Free Meeting
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                {{-- Success --}}
                <div id="meetingSuccess" class="alert alert-success d-none" role="alert">
                    <i class="fas fa-check-circle me-2"></i><span id="meetingSuccessText"></span>
                </div>
                {{-- Date Availability Warning --}}
                <div id="meetingDateWarning" class="alert alert-danger d-none" role="alert">
                    <i class="fas fa-calendar-times me-2"></i><span id="meetingDateWarningText"></span>
                </div>
                {{-- Error --}}
                <div id="meetingError" class="alert alert-danger d-none" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i><span id="meetingErrorText"></span>
                </div>

                <form id="bookMeetingForm">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="bm_name" class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="bm_name" name="name" placeholder="Your full name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="bm_email" class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="bm_email" name="email" placeholder="your@email.com" required>
                        </div>
                        <div class="col-md-6">
                            <label for="bm_phone" class="form-label fw-semibold">Phone Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="bm_phone" name="phone" placeholder="+92-XXX-XXXXXXX" required>
                        </div>
                        <div class="col-md-6">
                            <label for="bm_date" class="form-label fw-semibold">Preferred Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="bm_date" name="meeting_date"
                                   min="{{ date('Y-m-d') }}" required>
                            <div id="bm_date_status" class="form-text mt-1"></div>
                        </div>
                        <div class="col-12">
                            <label for="bm_query" class="form-label fw-semibold">Your Query <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="bm_query" name="description" rows="4"
                                      placeholder="Tell us what you would like to discuss..." required></textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4 gap-2">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="bm_submitBtn" class="btn text-dark fw-bold"
                                style="background: linear-gradient(135deg,#f59e0b,#d97706); padding: 10px 28px;">
                            <i class="fas fa-calendar-check me-1"></i> Book Meeting
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
(function () {
    var bookedDates = [];
    var dateCheckTimeout = null;

    // Fetch confirmed (blocked) dates once modal opens
    document.getElementById('bookMeetingModal').addEventListener('show.bs.modal', function () {
        fetch('{{ route("meeting-booking.booked-dates") }}')
            .then(function(r){ return r.json(); })
            .then(function(dates) {
                bookedDates = dates;
                applyDateRestrictions();
            });
    });

    var dateInput = document.getElementById('bm_date');
    var dateStatus = document.getElementById('bm_date_status');
    var submitBtn = document.getElementById('bm_submitBtn');
    var dateWarning = document.getElementById('meetingDateWarning');
    var dateWarningText = document.getElementById('meetingDateWarningText');

    function applyDateRestrictions() {
        // HTML5 date input doesn't support disabling individual dates natively
        // We validate on change instead
        if (dateInput.value && bookedDates.includes(dateInput.value)) {
            markDateBooked();
        }
    }

    function markDateBooked() {
        dateStatus.innerHTML = '<span class="text-danger"><i class="fas fa-times-circle"></i> This date is fully booked.</span>';
        submitBtn.disabled = true;
    }

    function markDateAvailable() {
        dateStatus.innerHTML = '<span class="text-success"><i class="fas fa-check-circle"></i> Date is available!</span>';
        submitBtn.disabled = false;
    }

    function clearDateStatus() {
        dateStatus.innerHTML = '<span class="text-muted"><i class="fas fa-spinner fa-spin"></i> Checking availability...</span>';
        submitBtn.disabled = true;
    }

    dateInput.addEventListener('change', function () {
        var selectedDate = this.value;
        if (!selectedDate) return;

        // Hide previous warnings
        dateWarning.classList.add('d-none');

        // Client-side instant check first
        if (bookedDates.includes(selectedDate)) {
            markDateBooked();
            return;
        }

        clearDateStatus();

        // Server-side AJAX check
        clearTimeout(dateCheckTimeout);
        dateCheckTimeout = setTimeout(function () {
            fetch('{{ route("meeting-booking.check-date") }}?date=' + selectedDate)
                .then(function(r){ return r.json(); })
                .then(function(data) {
                    if (data.available) {
                        markDateAvailable();
                    } else {
                        markDateBooked();
                        bookedDates.push(selectedDate);
                    }
                })
                .catch(function() {
                    dateStatus.innerHTML = '';
                    submitBtn.disabled = false;
                });
        }, 300);
    });

    // Form submission
    document.getElementById('bookMeetingForm').addEventListener('submit', function (e) {
        e.preventDefault();

        var form  = this;
        var btn   = document.getElementById('bm_submitBtn');
        var successDiv = document.getElementById('meetingSuccess');
        var errorDiv   = document.getElementById('meetingError');

        successDiv.classList.add('d-none');
        errorDiv.classList.add('d-none');
        dateWarning.classList.add('d-none');

        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Booking...';

        var formData = new FormData(form);

        fetch('{{ route("meeting-booking.store") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': form.querySelector('[name="_token"]').value,
                'Accept': 'application/json',
            },
            body: formData,
        })
        .then(function(r){ return r.json(); })
        .then(function(data) {
            if (data.success) {
                document.getElementById('meetingSuccessText').textContent = data.message;
                successDiv.classList.remove('d-none');
                form.reset();
                dateStatus.innerHTML = '';

                // Open WhatsApp after short delay
                var msg = encodeURIComponent(
                    '📅 New Meeting Request!\n' +
                    'Name: ' + data.name + '\n' +
                    'Email: ' + data.email + '\n' +
                    'Phone: ' + data.phone + '\n' +
                    'Date: ' + data.meeting_date + '\n' +
                    'Query: ' + data.description
                );
                setTimeout(function() {
                    window.open('https://wa.me/923000311868?text=' + msg, '_blank');
                }, 800);
            } else {
                var msg = data.message || 'Something went wrong. Please try again.';
                if (data.errors) {
                    msg = Object.values(data.errors).flat().join(' ');
                }
                // Check if it's a date availability error
                if (data.message && data.message.toLowerCase().includes('booked')) {
                    dateWarningText.textContent = data.message;
                    dateWarning.classList.remove('d-none');
                    bookedDates.push(document.getElementById('bm_date').value);
                    markDateBooked();
                } else {
                    document.getElementById('meetingErrorText').textContent = msg;
                    errorDiv.classList.remove('d-none');
                }
            }
        })
        .catch(function() {
            document.getElementById('meetingErrorText').textContent = 'Connection error. Please try again.';
            errorDiv.classList.remove('d-none');
        })
        .finally(function() {
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-calendar-check me-1"></i> Book Meeting';
        });
    });

    // Reset form and alerts when modal closes
    document.getElementById('bookMeetingModal').addEventListener('hidden.bs.modal', function () {
        document.getElementById('bookMeetingForm').reset();
        document.getElementById('meetingSuccess').classList.add('d-none');
        document.getElementById('meetingError').classList.add('d-none');
        document.getElementById('meetingDateWarning').classList.add('d-none');
        document.getElementById('bm_date_status').innerHTML = '';
        document.getElementById('bm_submitBtn').disabled = false;
    });
})();
</script>
