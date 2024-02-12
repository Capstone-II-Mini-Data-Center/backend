<!-- resources/views/confirmation-modal.blade.php -->

<div id="confirmationModal" class="fixed inset-0 z-50 hidden justify-center items-center">
    <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
    <div class="bg-white p-8 rounded-md shadow-lg">
        <p class="text-lg mb-4" id="confirmationText"></p>
        <div class="flex justify-end">
            <button id="confirmButton" class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2" onclick="confirmUpdate()">Update</button>
            <button id="cancelButton" class="text-gray-500 hover:text-gray-700" onclick="cancelUpdate()">Cancel</button>
        </div>
    </div>
</div>

<script>
    document.getElementById('confirmationModal').classList.add('hidden');

    var selectedOrderId = null;

    function openConfirmationModal(orderId, selectedStatus) {
        selectedOrderId = orderId;
        var modal = document.getElementById('confirmationModal');
        var confirmationText = document.getElementById('confirmationText');

        confirmationText.innerText = 'Are you sure you want to update the status to ' + selectedStatus + '?';

        modal.classList.remove('hidden');
    }

    function confirmUpdate() {
        var updateForm = document.getElementById('updateForm_' + selectedOrderId);
        updateForm.submit();
    }

    function cancelUpdate() {
        document.getElementById('confirmationModal').classList.add('hidden');
        selectedOrderId = null; // Reset selectedOrderId
    }
</script>
