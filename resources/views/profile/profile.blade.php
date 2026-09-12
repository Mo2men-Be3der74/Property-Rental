<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Modern Rental - Profile</title>

    <link rel="stylesheet" href="{{asset('checkout/assets/css/profile.css')}}">

</head>


<body>


<header class="navbar">

    <div class="logo">
        <span>🏠</span> Modern Rental
    </div>
<nav>

    <a href="project.html">Home</a>

    <a href="project.html#properties">Properties</a>

    <a href="project.html#how">How it works</a>

    <a href="project.html#contact">Contact</a>

</nav>

    <a href="profile.html" class="login">
    Profile
</a>

</header>
<main>


    <section class="profile-section">

        <div class="profile-info">


            <p class="eyebrow">
                ACCOUNT
            </p>


            <h1>
                My Profile
            </h1>


            <p class="subtitle">
                Manage your personal information and account settings.
            </p>


            <div class="profile-card">


                <div class="avatar">
                    AN
                </div>


                <h2>
                    {{ $user->name }}
                </h2>


                <p>
                    {{ $user->email }}
                </p>


                <span>
                    {{ $user->phone }}
                </span>


                <button
                    class="edit-btn"
                    onclick="enableEdit()">

                    Edit Profile

                </button>


            </div>


        </div>

        <div class="details-card">


            <p class="eyebrow">
                PERSONAL INFORMATION
            </p>


            <h2>
                Account Details
            </h2>


            <form id="profileForm">


                <div class="form-row">


                    <div class="field">

                        <label>
                            Name
                        </label>

                        <input
                            type="text"
                            id="name"
                            value="{{$user->name}}"
                            disabled>

                    </div>


                </div>



                <div class="field full">

                    <label>
                        Email Address
                    </label>

                    <input
                        type="email"
                        id="email"
                        value="{{ $user->email }}"
                        disabled>

                </div>



                <div class="field full">

                    <label>
                        Phone Number
                    </label>

                    <input
                        type="text"
                        id="phone"
                        value="{{ $user->phone }}"
                        disabled>

                </div>





                <button
                    type="submit"
                    class="save-btn"
                    id="saveBtn"
                    disabled>

                    Save Changes

                </button>


            </form>


        </div>


    </section>

    <section class="account-section">


        <p class="eyebrow">
            QUICK ACCESS
        </p>


        <h2>
            Account
        </h2>


        <div class="account-grid">


            <div class="account-card">

                <span>01</span>

                <div>

                    <h3>
                        My Bookings
                    </h3>

                    <p>
                        View your current and previous bookings.
                    </p>

                </div>

            </div>



            <div class="account-card">

                <span>02</span>

                <div>

                    <h3>
                        Favorites
                    </h3>

                    <p>
                        View properties you saved.
                    </p>

                </div>

            </div>



            <div class="account-card">

                <span>03</span>

                <div>

                    <h3>
                        Payment Methods
                    </h3>

                    <p>
                        Manage your payment information.
                    </p>

                </div>

            </div>



            <div class="account-card">

                <span>04</span>

                <div>

                    <h3>
                        Change Password
                    </h3>

                    <p>
                        Update your account password.
                    </p>

                </div>

            </div>


        </div>


    </section>


</main>

<footer id="contact">


    <div>

        <b>
            Modern Rental
        </b>

        <p>
            Simple property rental for modern living.
        </p>

    </div>


    <div>

        <b>
            Company
        </b>

        <p>
            About · Properties · Contact
        </p>

    </div>


    <div>

        <b>
            Support
        </b>

        <p>
            Help Center · Terms · Privacy
        </p>

    </div>


</footer>



<script>
    function enableEdit() {

        document.getElementById("name").disabled = false;
        document.getElementById("email").disabled = false;
        document.getElementById("phone").disabled = false;

        document.getElementById("saveBtn").disabled = false;

    }


    document.getElementById("profileForm").addEventListener("submit", function(event) {

        event.preventDefault();

        document.getElementById("name").disabled = true;
        document.getElementById("email").disabled = true;
        document.getElementById("phone").disabled = true;

        document.getElementById("saveBtn").disabled = true;

        alert("Profile updated successfully!");

    });
</script>

</body>

</html>
