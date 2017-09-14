# Branch build-docker
This branch is meant for testing using a throwaway setup via Docker.

Username: smf  
Password: smf1  

# Build
`docker build --rm -t smf_forum .`  
`docker run -it --name "smf" -p 80:8080 smf_forum`  
