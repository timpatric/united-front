#include<stdio.h>
#include<stdlib.h>

#include<sys/types.h>
#include<sys/socket.h>

#include<netinet/in.h>

int main(){

    //CREATE SOCKET
    int my_socket;
    my_socket = socket(AF_INET, SOCK_STREAM, 0);


    //SPECIFY ADDRESS FOR THE SOCKET
    struct sockaddr_in server_address;
    server_address.sin_family = AF_INET;
    server_address.sin_port = htons(9002);
    server_address.sin_addr.s_addr = INADDR_ANY;

    int connection_status = connect(my_socket, (struct sockaddr *) &server_address, sizeof(server_address));
    //check for error with the connection
    if (connection_status == -1)
    {
        printf ("An error occured during connection to the remote socket\n\n\n");
    }

    //receive data from server
    char server_response[256];
    recv(my_socket, &server_response, sizeof(server_response), 0);

    //print out the server's response
    printf("%s\n ", server_response);

    //close the socket
    close(my_socket);

    return 0;
}
