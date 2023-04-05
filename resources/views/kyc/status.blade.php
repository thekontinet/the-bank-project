<x-guest-layout>
    <div
    class="w-full min-h-screen grid place-items-center pb-4 bg-gradient-to-r from-primary-500 via-primary-700 to-primary-900"
  >
  <div class="bg-white rounded-lg shadow-md w-full h-1/2 p-10 max-w-xl mx-auto">
    <i
        class="w-16 h-16 text-green-500 mx-auto transition-transform duration-300 iconify group-hover:translate-x-1"
        data-icon="lucide:check-circle"
    ></i>
    @if($kyc->isVerified())
    <h4 class="text-xl font-semibold text-center">KYC Complete</h4>
    <p class="text-center w-full max-w-md mx-auto mt-4 text-sm">Congratulations! Your KYC verification is complete. You can now enjoy full access to our services with peace of mind, knowing that we have taken the necessary steps to ensure the security and integrity of our platform. Thank you for choosing our service, and we look forward to serving you.</p>
    @else
    <h4 class="text-xl font-semibold text-center">KYC Submitted</h4>
    <p class="text-center w-full max-w-md mx-auto mt-4 text-sm">Thank you for submitting your KYC information. Our team is currently reviewing your documents, and we will notify you once the verification process is complete. Please note that the verification process may take up to 7 working days to complete, and we appreciate your patience during this time. If you have any questions or concerns, please do not hesitate to contact our customer support team for assistance.</p>
    @endif
  </div>
</x-guest-layout>
