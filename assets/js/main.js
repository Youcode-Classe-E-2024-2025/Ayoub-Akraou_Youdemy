const getCerificateButton = document.getElementById("get-certificate");
const certificateCnt = document.querySelector(".certificate-overlay");
const closeCertificateButton = document.getElementById("close-certificate");

getCerificateButton?.addEventListener("click", () => {
  certificateCnt.classList.remove("hidden");
});

closeCertificateButton?.addEventListener("click", () => {
  certificateCnt.classList.add("hidden");
});

const downloadCertificate = document.getElementById("download-certificate");
const certificate = document.getElementById("certificate");

downloadCertificate?.addEventListener("click", () => {
  const options = {
    filename: "certificate.pdf",
    image: { type: "jpeg", quality: 1 },
    html2canvas: {
      scale: 2,
      useCORS: true,
      width: 800,
      height: 600,
      letterRendering: true,
    },
    jsPDF: {
      unit: "px",
      format: [800, 600],
      orientation: "landscape",
      hotfixes: ["px_scaling"],
    },
  };

  html2pdf().from(certificate).set(options).save();
});

function deleteCourse(courseId) {
  if (confirm("Are you sure you want to delete this course?")) {
    window.location.href = `/courses/delete?id=${courseId}`;
  }
}
