<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Contract</title>
</head>
<body>
    <h1>Rental Contract</h1>

    <p>Dear {{ $user->name }},</p>

    <p>We are pleased to inform you that your application for renting a unit has been approved.</p>

    <h2>Unit Details:</h2>
    <ul>
        <li><strong>Concourse Name:</strong> {{ $concourse->name ?? 'N/A' }}</li>
        <li><strong>Monthly Rent:</strong> ₱{{ number_format($monthlyPayment ?? 0, 2) }}</li>
        <li><strong>Lease Start Date:</strong> {{ $leaseStart ? $leaseStart->format('F d, Y') : 'N/A' }}</li>
        <li><strong>Lease End Date:</strong> {{ $leaseEnd ? $leaseEnd->format('F d, Y') : 'N/A' }}</li>
        <li><strong>Lease Term:</strong> {{ $leaseTerm ?? 'N/A' }} months</li>
    </ul>

    <h2>Additional Charges:</h2>
    @if(is_array($bills) && count($bills) > 0)
        <ul>
            @foreach($bills as $bill => $amount)
                <li><strong>{{ ucfirst($bill) }}:</strong> ${{ number_format($amount, 2) }}</li>
            @endforeach
        </ul>
    @else
        <p>No additional charges.</p>
    @endif

    <h2>Concourse Amenities:</h2>
    @if(isset($concourse->amenities) && is_array($concourse->amenities) && count($concourse->amenities) > 0)
        <ul>
            @foreach($concourse->amenities as $amenity)
                <li>{{ $amenity }}</li>
            @endforeach
        </ul>
    @else
        <p>No amenities listed.</p>
    @endif

    <h2>Terms and Conditions:</h2>
    <ol>
        <li>The tenant agrees to pay the monthly rent of ${{ number_format($monthlyPayment ?? 0, 2) }} on or before the 1st day of each month.</li>
        <li>The lease term is for {{ $leaseTerm ?? 'N/A' }} months, starting from {{ $leaseStart ? $leaseStart->format('F d, Y') : 'N/A' }} to {{ $leaseEnd ? $leaseEnd->format('F d, Y') : 'N/A' }}.</li>
        <li>The tenant is responsible for paying the additional charges as listed above.</li>
        <li>The tenant agrees to abide by all rules and regulations of the concourse.</li>
        <li>Any damages to the unit beyond normal wear and tear will be the responsibility of the tenant.</li>
        <!-- Add more terms and conditions as needed -->
    </ol>

    <p>Please review the terms and conditions carefully. If you have any questions or concerns, please don't hesitate to contact us.</p>

    <p>To confirm your acceptance of this contract, please reply to this email with your agreement or visit our office to sign the physical copy of the contract.</p>

    <p>Thank you for choosing our property.</p>

    <p>Best regards,<br>Property Management Team</p>
</body>
</html>