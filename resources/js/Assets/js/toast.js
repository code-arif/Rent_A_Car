window.successToast = function (msg) {
    Toastify({
        text: `<span>${msg}</span>
               <span style="cursor: pointer; color: #009CFF; margin-left: 10px; display: flex; justify-content: center; align-items: center;" onclick="this.parentNode.style.display='none'">
                   <i class="fa fa-times" aria-hidden="true"></i>
               </span>`,
        escapeMarkup: false, // Allow HTML content in the message
        className: "info",
        duration: 1500,
        style: {
            background: "#d6eaf8",
            borderLeft: "5px solid #009CFF",
            padding: "10px 15px",
            color: "#009CFF",
            display: "flex",
            justifyContent: "space-between",
            alignItems: "center",
            boxShadow: "0 4px 12px rgba(0, 0, 0, 0.1)",
        },
    }).showToast();
};


window.errorToast = function (msg) {
    Toastify({
        text: `<span>${msg}</span>
               <span style="cursor: pointer; color: #d90429; margin-left: 10px; display: flex; justify-content: center; align-items: center;" onclick="this.parentNode.style.display='none'">
                   <i class="fa fa-times" aria-hidden="true"></i>
               </span>`,
        escapeMarkup: false,
        className: "info",
        duration: 1500,
        style: {
            background: "#fadbd8",
            borderLeft: "5px solid #d90429",
            padding: "10px 15px",
            color: "#d90429",
            display: "flex",
            justifyContent: "space-between",
            alignItems: "center",
            boxShadow: "0 4px 12px rgba(0, 0, 0, 0.1)",
        },
    }).showToast();
};
