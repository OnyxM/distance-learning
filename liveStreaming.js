import AgoraRTC from "agora-rtc-sdk-ng";

let rtc = {
    // For the local audio and video tracks.
    localAudioTrack: null,
    localVideoTrack: null,
    client: null,
};

let options = {
    // Pass your app ID here.
    appId: "4495024a2d414911932996a968fc8559",
    // Set the channel name.
    channel: "237distance-learning",
    // Use a temp token
    token: "0064495024a2d414911932996a968fc8559IADsElzKaL7l5C/FHWeA2mYpVaBK5a5DozyWOC27bX4miFjRKA4AAAAAEACXaa56o7aGYgEAAQChtoZi",
    // Uid
    uid: 123456,
};

async function startBasicLiveStreaming() {
    // rtc.client = AgoraRTC.createClient({mode: "live",codec: "vp8"});

    window.onload = function () {
        document.getElementById("host-join").onclick = async function () {

            rtc.client = AgoraRTC.createClient({mode: "rtc",codec: "vp8"});

            // rtc.client.setClientRole("host");

            await rtc.client.join(options.appId, options.channel, options.token);

            // Enable dual-stream mode.
            rtc.client.enableDualStream();

            // Create an audio track from the audio sampled by a microphone.
            rtc.localAudioTrack = await AgoraRTC.createMicrophoneAudioTrack();
            // Create a video track from the video captured by a camera.
            rtc.localVideoTrack = await AgoraRTC.createCameraVideoTrack();

            // screen-sharing ...
            // rtc.screenTrack = await AgoraRTC.createScreenVideoTrack();

            // Publish the local audio and video tracks to the channel.
            await rtc.client.publish([rtc.localAudioTrack, rtc.localVideoTrack]);

            // Dynamically create a container in the form of a DIV element for playing the remote video track.
            const localPlayerContainer = document.createElement("div");

            // Specify the ID of the DIV container. You can use the `uid` of the remote user.
            localPlayerContainer.id = options.uid;
            // localPlayerContainer.textContent = "Local user " + options.uid;
            localPlayerContainer.style.width = "290px";
            localPlayerContainer.style.height = "290px";
            document.getElementById("users_live").append(localPlayerContainer);

            rtc.localVideoTrack.play(localPlayerContainer);

            rtc.client.on("user-published", async (user, mediaType) => {
                // Subscribe to a remote user.
                await rtc.client.subscribe(user, mediaType);

                // If the subscribed track is video.
                if (mediaType === "video") {
                    // Get `RemoteVideoTrack` in the `user` object.
                    const remoteVideoTrack = user.videoTrack;
                    // Dynamically create a container in the form of a DIV element for playing the remote video track.
                    const remotePlayerContainer = document.createElement("div");
                    // Specify the ID of the DIV container. You can use the `uid` of the remote user.
                    remotePlayerContainer.id = user.uid.toString();
                    // remotePlayerContainer.textContent = "Remote user " + user.uid.toString();
                    remotePlayerContainer.style.width = "290px";
                    remotePlayerContainer.style.height = "290px";
                    document.getElementById("users_live").append(remotePlayerContainer);

                    // Play the remote video track.
                    // Pass the DIV container and the SDK dynamically creates a player in the container for playing the remote video track.
                    remoteVideoTrack.play(remotePlayerContainer);

                    // Or just pass the ID of the DIV container.
                    // remoteVideoTrack.play(playerContainer.id);
                }

                // If the subscribed track is audio.
                if (mediaType === "audio") {
                    // Get `RemoteAudioTrack` in the `user` object.
                    const remoteAudioTrack = user.audioTrack;
                    // Play the audio track. No need to pass any DOM element.
                    remoteAudioTrack.play();
                }
            });

            rtc.client.on("user-unpublished", user => {
                // Get the dynamically created DIV container.
                const remotePlayerContainer = document.getElementById(user.uid);
                // Destroy the container.
                remotePlayerContainer.remove();
            });

            rtc.// Customize the video profile of the low-quality stream. Set the video profile as 160 × 120, 15 fps, 120 Kbps.
                client.setLowStreamParameter({
                width: 160,
                height: 120,
                framerate: 15,
                bitrate: 120,
            });

            $("#host-join").addClass('d-none');
            $("#leave").removeClass('d-none');
        };

        document.getElementById("audience-join").onclick = async function () {
            rtc.client = new AgoraRTC.createClient({mode: "live",codec: "vp8"});

            rtc.client.setClientRole("audience");
            await rtc.client.join(options.appId, options.channel, options.token);
            rtc.client.on("user-published", async (user, mediaType) => {
                // Subscribe to a remote user.
                await rtc.client.subscribe(user, mediaType);
                alert(user.uid);

                // If the subscribed track is video.
                if (mediaType === "video") {
                    // Get `RemoteVideoTrack` in the `user` object.
                    const remoteVideoTrack = user.videoTrack;
                    // Dynamically create a container in the form of a DIV element for playing the remote video track.
                    const remotePlayerContainer = document.createElement("div");
                    // Specify the ID of the DIV container. You can use the `uid` of the remote user.
                    remotePlayerContainer.id = user.uid.toString();
                    // remotePlayerContainer.textContent = "Remote user " + user.uid.toString();
                    remotePlayerContainer.style.width = "290px";
                    remotePlayerContainer.style.height = "290px";
                    document.body.append(remotePlayerContainer);

                    // Play the remote video track.
                    // Pass the DIV container and the SDK dynamically creates a player in the container for playing the remote video track.
                    remoteVideoTrack.play(remotePlayerContainer);

                    // Or just pass the ID of the DIV container.
                    // remoteVideoTrack.play(playerContainer.id);
                }

                // If the subscribed track is audio.
                if (mediaType === "audio") {
                    // Get `RemoteAudioTrack` in the `user` object.
                    const remoteAudioTrack = user.audioTrack;
                    // Play the audio track. No need to pass any DOM element.
                    remoteAudioTrack.play();
                }
            });

            rtc.client.on("user-unpublished", user => {
                // Get the dynamically created DIV container.
                const remotePlayerContainer = document.getElementById(user.uid);
                // Destroy the container.
                remotePlayerContainer.remove();
            });
        };

        document.getElementById("leave").onclick = async function () {
            rtc.client = AgoraRTC.createClient({mode: "live",codec: "vp8"});

            // Close all the local tracks.
            rtc.localAudioTrack.close();
            rtc.localVideoTrack.close();
            // Traverse all remote users.
            rtc.client.remoteUsers.forEach(user => {
                // Destroy the dynamically created DIV containers.
                const playerContainer = document.getElementById(user.uid);
                playerContainer && playerContainer.remove();
            });

            // Leave the channel.
            await rtc.client.leave();

            window.location = "https://distance-learning-237.herokuapp.com/user/live";
        };
    };
}

startBasicLiveStreaming();
