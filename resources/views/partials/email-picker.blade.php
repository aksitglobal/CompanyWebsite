<!-- ===== EMAIL PICKER MODAL ===== -->
<div id="emailPickerOverlay" class="email-picker-overlay">
    <div class="email-picker-modal">
        <div class="email-picker-header">
            <h3>Choose Email Platform</h3>
            <button id="closeEmailPicker" class="email-picker-close">&times;</button>
        </div>
        <div class="email-picker-body">
            <p>How would you like to contact <strong>contact@aksitglobal.com</strong>?</p>
            <div class="email-options">
                <a href="#" id="gmailLink" class="email-opt gmail" target="_blank">
                    <i class="fab fa-google"></i>
                    <span>Gmail</span>
                </a>
                <a href="#" id="outlookLink" class="email-opt outlook" target="_blank">
                    <i class="fab fa-windows"></i>
                    <span>Outlook</span>
                </a>
                <a href="#" id="yahooLink" class="email-opt yahoo" target="_blank">
                    <i class="fab fa-yahoo"></i>
                    <span>Yahoo Mail</span>
                </a>
                <a href="#" id="defaultMailto" class="email-opt default">
                    <i class="fas fa-envelope"></i>
                    <span>Default App</span>
                </a>
            </div>
            <div class="email-copy-wrap">
                <input type="text" value="contact@aksitglobal.com" id="emailToCopy" readonly>
                <button id="copyEmailBtn" title="Copy to clipboard">
                    <i class="fas fa-copy"></i> Copy
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    .email-picker-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.85);
        backdrop-filter: blur(8px);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }
    .email-picker-overlay.active {
        opacity: 1;
        visibility: visible;
    }
    .email-picker-modal {
        background: #1e293b;
        width: 90%;
        max-width: 400px;
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        overflow: hidden;
        transform: translateY(20px);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .email-picker-overlay.active .email-picker-modal {
        transform: translateY(0);
    }
    .email-picker-header {
        padding: 20px;
        background: #0f172a;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }
    .email-picker-header h3 {
        margin: 0;
        font-size: 1.1rem;
        color: #facc15;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .email-picker-close {
        background: none;
        border: none;
        color: #64748b;
        font-size: 1.8rem;
        cursor: pointer;
        line-height: 1;
        transition: color 0.2s;
    }
    .email-picker-close:hover { color: #fff; }
    
    .email-picker-body { padding: 25px; text-align: center; }
    .email-picker-body p { color: #94a3b8; font-size: 0.95rem; margin-bottom: 24px; }
    
    .email-options {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        margin-bottom: 24px;
    }
    .email-opt {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 16px;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 12px;
        color: #f8fafc;
        text-decoration: none !important;
        transition: all 0.2s ease;
    }
    .email-opt i { font-size: 1.5rem; margin-bottom: 8px; }
    .email-opt span { font-size: 0.85rem; font-weight: 600; }
    
    .email-opt:hover {
        background: rgba(255, 255, 255, 0.08);
        border-color: #facc15;
        transform: translateY(-3px);
    }
    
    .email-opt.gmail i { color: #ea4335; }
    .email-opt.outlook i { color: #0078d4; }
    .email-opt.yahoo i { color: #6001d2; }
    .email-opt.default i { color: #94a3b8; }
    
    .email-copy-wrap {
        display: flex;
        background: #0f172a;
        padding: 4px;
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    .email-copy-wrap input {
        background: none;
        border: none;
        color: #cbd5e1;
        padding: 8px 12px;
        font-size: 0.85rem;
        width: 100%;
        outline: none;
    }
    .email-copy-wrap button {
        background: #334155;
        color: #fff;
        border: none;
        padding: 0 16px;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
        white-space: nowrap;
    }
    .email-copy-wrap button:hover { background: #475569; }
</style>
