#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>
#include <unistd.h>
#include <sys/socket.h>
#include <sys/types.h>
#include <netinet/in.h>
#include <arpa/inet.h>
#include <malloc.h>

#include "headers.h"  


//search receiver function
void receiver(int clientSocket,char userInput[],char agentDistrict[]){
	send(clientSocket,agentDistrict,512,0);
	send(clientSocket, userInput,512, 0);
	bzero(userInput,512);
	char filex[512];
	int ch = 0;
	//receive search data from the server
	recv(clientSocket, filex, 512,0);
	int words = atoi(filex); //string to int conversion

	while(ch != words){
		recv(clientSocket, userInput, 512, 0);
		printf("%s\n",userInput);
		ch++;
	}
}

void strTrim(char str[])     // removing any leading or preceding whitespaces
{
    int i = 0, j = 0;
    char buf[512];
    strcpy(buf, str);
    for(;str[i] == ' ';i++);

    for(;str[i] != '\0';i++,j++)
            buf[j] = str[i];
    buf[j] = '\0';
    strcpy(str, buf);
}




void signature(){
	int signature[10][10];

	for(int x=1;x<6;x++){
        for(int j=1;j<4;j++){
        	printf("\n\nCell(%d,%d)-",x,j);
        	scanf("%d",&signature[x][j]);
        }
    }

    for(int x=1;x<6;x++){
    	for(int j=1;j<4;j++){
    		if(signature[x][j] == 1){
    			printf("*");
    		}else {
    			printf(" ");
    		}
    	}
    	printf("\n");
    }


    // defining the signature of A
    if(signature[1][1] == 0){
    	if(signature[1][2] == 1){
    		if(signature[1][3] == 0){
    			if(signature[2][1] == 1){
    				if(signature[2][2] == 0){
    					if(signature[2][3] == 1){
    						if(signature[3][1] == 1){
    							if(signature[3][2] == 1){
    								if(signature[3][3] == 1){
    									if(signature[4][1] == 1){
    										if(signature[4][2] == 0){
    											if(signature[4][3] == 1){
    												if(signature[5][1] == 1){
    													if(signature[5][2] == 0){
    														if(signature[5][3] == 1){
    															printf("\nYour signature is: 'A'\n");
														        FILE*fptr;
														        fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'A'\n");
														        fclose(fptr);
														    }
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}  // end of A


    // defining the signature of B
    if(signature[1][1] == 1){
    	if(signature[1][2] == 1){
            if(signature[1][3] == 0){
                if(signature[2][1] == 1){
                    if(signature[2][2] == 0){
                        if(signature[2][3] == 1){
                            if(signature[3][1] == 1){
                                if(signature[3][2] == 1){
                                    if(signature[3][3] == 0){
                                        if(signature[4][1] == 1){
                                            if(signature[4][2] == 0){
                                                if(signature[4][3] == 1){
                                                    if(signature[5][1] == 1){
                                                        if(signature[5][2] == 1){
                                                            if(signature[5][3] == 0){
                                                                printf("\nYour signature is: 'B'\n");
                                                                FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'B'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of B


    // defining the signature of C
    if(signature[1][1] == 0){
        if(signature[1][2] == 1){
            if(signature[1][3] == 1){
                if(signature[2][1] == 1){
                    if(signature[2][2] == 0){
                        if(signature[2][3] == 0){
                            if(signature[3][1] == 1){
                                if(signature[3][2] == 0){
                                    if(signature[3][3] == 0){
                                        if(signature[4][1] == 1){
                                            if(signature[4][2] == 0){
                                                if(signature[4][3] == 0){
                                                    if(signature[5][1] == 0){
                                                        if(signature[5][2] == 1){
                                                            if(signature[5][3] == 1){
                                                                printf("\nYour signature: is 'C'\n");
                                                                FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'C'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of C


    // defining the signature of D
    if(signature[1][1] == 1){
        if(signature[1][2] == 0){
            if(signature[1][3] == 0){
                if(signature[2][1] == 1){
                    if(signature[2][2] == 1){
                        if(signature[2][3] == 0){
                            if(signature[3][1] == 1){
                                if(signature[3][2] == 0){
                                    if(signature[3][3] == 1){
                                        if(signature[4][1] == 1){
                                            if(signature[4][2] == 0){
                                                if(signature[4][3] == 1){
                                                    if(signature[5][1] == 1){
                                                        if(signature[5][2] == 1){
                                                            if(signature[5][3] == 1){
                                                                printf("\nYour signature is: 'D'\n");
																FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'D'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }   // end of D


    // defining the signature of E
    if(signature[1][1] == 1){
        if(signature[1][2] == 1){
            if(signature[1][3] == 1){
                if(signature[2][1] == 1){
                    if(signature[2][2] == 0){
                        if(signature[2][3] == 0){
                            if(signature[3][1] == 1){
                                if(signature[3][2] == 1){
                                    if(signature[3][3] == 1){
                                        if(signature[4][1] == 1){
                                            if(signature[4][2] == 0){
                                                if(signature[4][3] == 1){
                                                    if(signature[5][1] == 1){
                                                        if(signature[5][2] == 1){
                                                            if(signature[5][3] == 1){
                                                                printf("\nYour signature is: 'E'\n");
																FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'E'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of E


    // defining the signature of F
    if(signature[1][1] == 1){
        if(signature[1][2] == 1){
            if(signature[1][3] == 1){
                if(signature[2][1] == 1){
                    if(signature[2][2] == 0){
                        if(signature[2][3] == 0){
                            if(signature[3][1] == 1){
                                if(signature[3][2] == 1){
                                    if(signature[3][3] == 0){
                                        if(signature[4][1] == 1){
                                            if(signature[4][2] == 0){
                                                if(signature[4][3] == 0){
                                                    if(signature[5][1] == 1){
                                                        if(signature[5][2] == 0){
                                                            if(signature[5][3] == 0){
                                                                printf("\nYour signature is: 'F'\n");
                                                                FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'F'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of F


    // defining the signature of G
    if(signature[1][1] == 1){
        if(signature[1][2] == 1){
            if(signature[1][3] == 1){
                if(signature[2][1] == 1){
                    if(signature[2][2] == 0){
                        if(signature[2][3] == 0){
                            if(signature[3][1] == 1){
                                if(signature[3][2] == 0){
                                    if(signature[3][3] == 0){
                                        if(signature[4][1] == 1){
                                            if(signature[4][2] == 1){
                                                if(signature[4][3] == 1){
                                                    if(signature[5][1] == 1){
                                                        if(signature[5][2] == 1){
                                                            if(signature[5][3] == 1){
                                                                printf("\nYour signature is: 'G'\n");
																FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'G'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of G


    // defining the signature of H
    if(signature[1][1] == 1){
        if(signature[1][2] == 0){
            if(signature[1][3] == 1){
                if(signature[2][1] == 1){
                    if(signature[2][2] == 0){
                        if(signature[2][3] == 1){
                            if(signature[3][1] == 1){
                                if(signature[3][2] == 1){
                                    if(signature[3][3] == 1){
                                        if(signature[4][1] == 1){
                                            if(signature[4][2] == 0){
                                                if(signature[4][3] == 1){
                                                    if(signature[5][1] == 1){
                                                        if(signature[5][2] == 0){
                                                            if(signature[5][3] == 1){
                                                                printf("\nYour signature is: 'H'\n");
																FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'H'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of H


    // defining the signature of I
    if(signature[1][1] == 1){
        if(signature[1][2] == 1){
            if(signature[1][3] == 1){
                if(signature[2][1] == 0){
                    if(signature[2][2] == 1){
                        if(signature[2][3] == 0){
                            if(signature[3][1] == 0){
                                if(signature[3][2] == 1){
                                    if(signature[3][3] == 0){
                                        if(signature[4][1] == 0){
                                            if(signature[4][2] == 1){
                                                if(signature[4][3] == 0){
                                                    if(signature[5][1] == 1){
                                                        if(signature[5][2] == 1){
                                                            if(signature[5][3] == 1){
                                                                printf("\nYour signature is: 'I'\n");
																FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'I'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of I


    // defining the signature of J
    if(signature[1][1] == 1){
        if(signature[1][2] == 1){
            if(signature[1][3] == 1){
                if(signature[2][1] == 0){
                    if(signature[2][2] == 0){
                        if(signature[2][3] == 1){
                            if(signature[3][1] == 0){
                                if(signature[3][2] == 0){
                                    if(signature[3][3] == 1){
                                        if(signature[4][1] == 1){
                                            if(signature[4][2] == 0){
                                                if(signature[4][3] == 1){
                                                    if(signature[5][1] == 1){
                                                        if(signature[5][2] == 1){
                                                            if(signature[5][3] == 1){
                                                                printf("\nYour signature is: 'J'\n");
                                                                FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'J'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of J


    // defining the signature of K
    if(signature[1][1] == 1){
        if(signature[1][2] == 0){
            if(signature[1][3] == 1){
                if(signature[2][1] == 1){
                    if(signature[2][2] == 1){
                        if(signature[2][3] == 0){
                            if(signature[3][1] == 1){
                                if(signature[3][2] == 0){
                                    if(signature[3][3] == 0){
                                        if(signature[4][1] == 1){
                                            if(signature[4][2] == 1){
                                                if(signature[4][3] == 0){
                                                    if(signature[5][1] == 1){
                                                        if(signature[5][2] == 0){
                                                            if(signature[5][3] == 1){
                                                                printf("\nYour signature is: 'K'\n");
																FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'K'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of K


    // defining the signature of L
    if(signature[1][1] == 1){
        if(signature[1][2] == 0){
            if(signature[1][3] == 0){
                if(signature[2][1] == 1){
                    if(signature[2][2] == 0){
                        if(signature[2][3] == 0){
                            if(signature[3][1] == 1){
                                if(signature[3][2] == 0){
                                    if(signature[3][3] == 0){
                                        if(signature[4][1] == 1){
                                            if(signature[4][2] == 0){
                                                if(signature[4][3] == 0){
                                                    if(signature[5][1] == 1){
                                                        if(signature[5][2] == 1){
                                                            if(signature[5][3] == 1){
                                                                printf("\nYour signature is: 'L'\n");
																FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'L'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of L


    // defining the signature of M
    if(signature[1][1] == 1){
        if(signature[1][2] == 0){
            if(signature[1][3] == 1){
                if(signature[2][1] == 1){
                    if(signature[2][2] == 1){
                        if(signature[2][3] == 1){
                            if(signature[3][1] == 1){
                                if(signature[3][2] == 0){
                                    if(signature[3][3] == 1){
                                        if(signature[4][1] == 1){
                                            if(signature[4][2] == 0){
                                                if(signature[4][3] == 1){
                                                    if(signature[5][1] == 1){
                                                        if(signature[5][2] == 0){
                                                            if(signature[5][3] == 1){
                                                                printf("\nYour signature is: 'M'\n");
																FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'M'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of M 


    // defining the signature of N
    if(signature[1][1] == 1){
        if(signature[1][2] == 0){
            if(signature[1][3] == 1){
                if(signature[2][1] == 1){
                    if(signature[2][2] == 0){
                        if(signature[2][3] == 1){
                            if(signature[3][1] == 1){
                                if(signature[3][2] == 1){
                                    if(signature[3][3] == 1){
                                        if(signature[4][1] == 1){
                                            if(signature[4][2] == 0){
                                                if(signature[4][3] == 1){
                                                    if(signature[5][1] == 1){
                                                        if(signature[5][2] == 0){
                                                            if(signature[5][3] == 1){
                                                                printf("\nYour signature is: 'N'\n");
																FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'N'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of N


    // defining the signature of O
    if(signature[1][1] == 0){
        if(signature[1][2] == 1){
            if(signature[1][3] == 0){
                if(signature[2][1] == 1){
                    if(signature[2][2] == 0){
                        if(signature[2][3] == 1){
                            if(signature[3][1] == 1){
                                if(signature[3][2] == 0){
                                    if(signature[3][3] == 1){
                                        if(signature[4][1] == 1){
                                            if(signature[4][2] == 0){
                                                if(signature[4][3] == 1){
                                                    if(signature[5][1] == 0){
                                                        if(signature[5][2] == 1){
                                                            if(signature[5][3] == 0){
                                                                printf("\nYour signature is: 'O;\n");
																FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'O'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    } // end of O


    // defining the signature of P
    if(signature[1][1] == 1){
        if(signature[1][2] == 1){
            if(signature[1][3] == 1){
                if(signature[2][1] == 1){
                    if(signature[2][2] == 0){
                        if(signature[2][3] == 1){
                            if(signature[3][1] == 1){
                                if(signature[3][2] == 1){
                                    if(signature[3][3] == 1){
                                        if(signature[4][1] == 1){
                                            if(signature[4][2] == 0){
                                                if(signature[4][3] == 0){
                                                    if(signature[5][1] == 1){
                                                        if(signature[5][2] == 0){
                                                            if(signature[5][3] == 0){
                                                                printf("\nYour signature is: 'P'\n");
																FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'P'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of P


    // defining the signature of Q
    if(signature[1][1] == 0){
        if(signature[1][2] == 1){
            if(signature[1][3] == 0){
                if(signature[2][1] == 1){
                    if(signature[2][2] == 0){
                        if(signature[2][3] == 1){
                            if(signature[3][1] == 1){
                                if(signature[3][2] == 1){
                                    if(signature[3][3] == 1){
                                        if(signature[4][1] == 1){
                                            if(signature[4][2] == 1){
                                                if(signature[4][3] == 1){
                                                    if(signature[5][1] == 0){
                                                        if(signature[5][2] == 1){
                                                            if(signature[5][3] == 1){
                                                                printf("\nYour signature is: 'Q'\n");
																FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'Q'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of Q


    // defining the signature of R
    if(signature[1][1] == 1){
        if(signature[1][2] == 1){
            if(signature[1][3] == 1){
                if(signature[2][1] == 1){
                    if(signature[2][2] == 0){
                        if(signature[2][3] == 1){
                            if(signature[3][1] == 1){
                                if(signature[3][2] == 1){
                                    if(signature[3][3] == 0){
                                        if(signature[4][1] == 1){
                                            if(signature[4][2] == 0){
                                                if(signature[4][3] == 1){
                                                    if(signature[5][1] == 1){
                                                        if(signature[5][2] == 0){
                                                            if(signature[5][3] == 1){
                                                                printf("\nYour signature is: 'R'\n");
																FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'R'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of R


    // defining the signature of S
    if(signature[1][1] == 0){
        if(signature[1][2] == 1){
            if(signature[1][3] == 1){
                if(signature[2][1] == 1){
                    if(signature[2][2] == 0){
                        if(signature[2][3] == 0){
                            if(signature[3][1] == 0){
                                if(signature[3][2] == 1){
                                    if(signature[3][3] == 0){
                                        if(signature[4][1] == 0){
                                            if(signature[4][2] == 0){
                                                if(signature[4][3] == 1){
                                                    if(signature[5][1] == 1){
                                                        if(signature[5][2] == 1){
                                                            if(signature[5][3] == 0){
                                                                printf("\nYour signature is 'S'\n");
																FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'S'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of S


    // defining the signature of T
    if(signature[1][1] == 1){
        if(signature[1][2] == 1){
            if(signature[1][3] == 1){
                if(signature[2][1] == 0){
                    if(signature[2][2] == 1){
                        if(signature[2][3] == 0){
                            if(signature[3][1] == 0){
                                if(signature[3][2] == 1){
                                    if(signature[3][3] == 0){
                                        if(signature[4][1] == 0){
                                            if(signature[4][2] == 1){
                                                if(signature[4][3] == 0){
                                                    if(signature[5][1] == 0){
                                                        if(signature[5][2] == 1){
                                                            if(signature[5][3] == 0){
                                                                printf("\nYour signature is: 'T'\n");
																FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'T'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of T


    // defining the signature of U
    if(signature[1][1] == 1){
        if(signature[1][2] == 0){
            if(signature[1][3] == 1){
                if(signature[2][1] == 1){
                    if(signature[2][2] == 0){
                        if(signature[2][3] == 1){
                            if(signature[3][1] == 1){
                                if(signature[3][2] == 0){
                                    if(signature[3][3] == 1){
                                        if(signature[4][1] == 1){
                                            if(signature[4][2] == 0){
                                                if(signature[4][3] == 1){
                                                    if(signature[5][1] == 1){
                                                        if(signature[5][2] == 1){
                                                            if(signature[5][3] == 1){
                                                                printf("\nYour signature is: 'U'\n");
																FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'U'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }   // end of U


    // defining the signature of V
    if(signature[1][1] == 1){
        if(signature[1][2] == 0){
            if(signature[1][3] == 1){
                if(signature[2][1] == 1){
                    if(signature[2][2] == 0){
                        if(signature[2][3] == 1){
                            if(signature[3][1] == 1){
                                if(signature[3][2] == 0){
                                    if(signature[3][3] == 1){
                                        if(signature[4][1] == 1){
                                            if(signature[4][2] == 0){
                                                if(signature[4][3] == 1){
                                                    if(signature[5][1] == 0){
                                                        if(signature[5][2] == 1){
                                                            if(signature[5][3] == 0){
                                                                printf("\nYour signature is: 'V'\n");
																FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'V'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }   // end of V


    // defining the signature of W
    if(signature[1][1] == 1){
        if(signature[1][2] == 0){
            if(signature[1][3] == 1){
                if(signature[2][1] == 1){
                    if(signature[2][2] == 0){
                        if(signature[2][3] == 1){
                            if(signature[3][1] == 1){
                                if(signature[3][2] == 1){
                                    if(signature[3][3] == 1){
                                        if(signature[4][1] == 1){
                                            if(signature[4][2] == 1){
                                                if(signature[4][3] == 1){
                                                    if(signature[5][1] == 1){
                                                        if(signature[5][2] == 0){
                                                            if(signature[5][3] == 1){
                                                                printf("\nYour signature is: 'W'\n");
																FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a"); 
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'W'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of W


    // defining the signature of X
    if(signature[1][1] == 1){
        if(signature[1][2] == 0){
            if(signature[1][3] == 1){
                if(signature[2][1] == 1){
                    if(signature[2][2] == 0){
                        if(signature[2][3] == 1){
                            if(signature[3][1] == 0){
                                if(signature[3][2] == 1){
                                    if(signature[3][3] == 0){
                                        if(signature[4][1] == 1){
                                            if(signature[4][2] == 0){
                                                if(signature[4][3] == 1){
                                                    if(signature[5][1] == 1){
                                                        if(signature[5][2] == 0){
                                                            if(signature[5][3] == 1){
                                                                printf("\nYour signature is: 'X'\n");
																FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'X'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of X


    // defining the signature of Y
    if(signature[1][1] == 1){
        if(signature[1][2] == 0){
            if(signature[1][3] == 1){
                if(signature[2][1] == 0){
                    if(signature[2][2] == 1){
                        if(signature[2][3] == 1){
                            if(signature[3][1] == 0){
                                if(signature[3][2] == 1){
                                    if(signature[3][3] == 0){
                                        if(signature[4][1] == 0){
                                            if(signature[4][2] == 1){
                                                if(signature[4][3] == 0){
                                                    if(signature[5][1] == 1){
                                                        if(signature[5][2] == 0){
                                                            if(signature[5][3] == 0){
                                                                printf("\nYour signature is: 'Y'\n");
																FILE*fptr;
                                                                fptr=fopen("member-enrollment.txt","a");
                                                                fprintf(fptr,"Y\n"); 
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'Y'\n");
                                                                fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of Y


    // defining the signature of Z
    if(signature[1][1] == 1){
    	if(signature[1][2] == 1){
            if(signature[1][3] == 1){
                if(signature[2][1] == 0){
                    if(signature[2][2] == 0){
                        if(signature[2][3] == 1){
                            if(signature[3][1] == 0){
                                if(signature[3][2] == 1){
                                    if(signature[3][3] == 0){
                                        if(signature[4][1] == 0){
                                            if(signature[4][2] == 1){
                                                if(signature[4][3] == 0){
                                                    if(signature[5][1] == 1){
                                                        if(signature[5][2] == 1){
                                                            if(signature[5][3] == 1){
                                                            	printf("\nYour signature is: 'Z'\n");
                                                            	FILE*fptr;
                                                            	fptr=fopen("member-enrollment.txt","a"); 
                                                                fprintf(fptr,"\nSignature of Agent that entered the above member(s) is: 'Z'\n");
                                                            	fclose(fptr);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }  // end of Z

}  // end of the 26 single letter signatures


int main(){
	int clientSocket, ret;
	struct sockaddr_in serverAddr;

	clientSocket = socket(AF_INET, SOCK_STREAM, 0);
	if(clientSocket < 0){
		printf("Connection error.\n");
		exit(1);
	}

	memset(&serverAddr, '\0', sizeof(serverAddr));
	serverAddr.sin_family = AF_INET;
	serverAddr.sin_port = htons(PORT);
	serverAddr.sin_addr.s_addr = inet_addr("127.0.0.1");

	ret = connect(clientSocket, (struct sockaddr*)&serverAddr, sizeof(serverAddr));
	if(ret < 0){
		printf("Connection error.\n");
		exit(1);
	}

	printf("\n\nGROUP-G10 welcomes you!\n");

	printf("\n**** UFT MEMBER DETAIL SUBMISSION PROGRAM ****\n");

    char agentDistrict[512];
	char agentUsername[512];
    printf("\nAs an agent, enter your District:");
	scanf("%s",agentDistrict);    // getting district of current agent entering a new member
	printf("\nEnter your agent username:");
    scanf("%s",agentUsername);      // getting username of agent entering the details

	while(1){
		char userInput[512];

		bzero(userInput,sizeof(userInput));
		printf("\n\n----------------------------Available commands:----------------------------\n");
		printf("To submit the new member list\n");
		// printf("\t( Addmember member_name, date, gender, recommender )\n");
		printf("\t( Addmember member_name, gender, recommender, date[AUTO-INSERTED] )\n");
		printf("To check status of the file\n");
		printf("\t( Check_status )\n");
		printf("To check statement of payments for the logged in user\n");
		printf("\t( get_statement )\n");
		printf("To submit new members from the file\n");
		printf("\t( Addmember filename.txt )\n");
		printf("To search and view a record from file by date or name\n");
		printf("\t( Search criteria )\n");
		printf("----------------------------End of command list:---------------------------\n");
		printf("\nq = Proceed to signout\n\n");

		printf("\nAdd your command here:==>>");
		scanf("%s", &userInput[0]);

		if(strcmp(userInput, "q") == 0 || strcmp(userInput, "Q") == 0){
			printf("\nYou MUST add a signature before signing out of current session\n");
			
			printf("\nA -- 010101111101101\n");
			printf("\nB -- 110101110101110\n");
			printf("\nC -- 011100100100011\n");
			printf("\nD -- 100110101101111\n");
			printf("\nE -- 111100111101111\n");
			printf("\nF -- 111100110100100\n");
			printf("\nG -- 111100100111111\n");
			printf("\nH -- 101101111101101\n");
			printf("\nI -- 111010010010111\n");
			printf("\nJ -- 111001001101111\n");
			printf("\nK -- 101110100110101\n");
			printf("\nL -- 100100100100111\n");
			printf("\nM -- 101111101101101\n");
			printf("\nN -- 101101111101101\n");
			printf("\nO -- 010101101101010\n");
			printf("\nP -- 111101111100100\n");
			printf("\nQ -- 010101111111011\n");
			printf("\nR -- 111101110101101\n");
			printf("\nS -- 011100010001110\n");
			printf("\nT -- 111010010010010\n");
			printf("\nU -- 101101101101111\n");
			printf("\nV -- 101101101101010\n");
			printf("\nW -- 101101111111101\n");
			printf("\nX -- 101101010101101\n");
			printf("\nY -- 101011010010100\n");
			printf("\nZ -- 111001010010111\n"); 

			signature();//calling the signature fn() above

			int s_check = send(clientSocket, userInput, strlen(userInput), 0);
			// int s_check = userInput;

			close(clientSocket);
			printf("\nSuccessfully ended your session.\n");
			exit(1);
		}
		else if(strcmp(userInput, "Addmember") == 0){       // code for handling member addition into db
			send(clientSocket,userInput,512,0);
			send(clientSocket,agentDistrict,sizeof(agentDistrict),0);
			scanf("%[^\n]s",userInput);
			// char *file = userInput;
			strTrim(userInput); //trimming the leading and preceding whitespaces

			int words = 0;

			FILE *fp;
			fp =fopen(userInput, "r");     // opening a file for reading

			if(fp == NULL){
				send(clientSocket,userInput,512,0);
				recv(clientSocket,userInput,512,0);
				printf("%s\n",userInput);
			}else{
				bzero(userInput,sizeof(userInput));
				char file[512] = "file";
                
				send(clientSocket, file, sizeof(file),0);

				while(fgets(userInput,512,fp)!=NULL){
					words++;
				}
				printf("\n\n%d",words);   // print number of members in the file

				send(clientSocket, &words, sizeof(int),0);
				rewind(fp);

				char ch;
				while(fgets(userInput, 512, fp) != NULL ){
					send(clientSocket,userInput,512,0); 
					recv(clientSocket,userInput,512,0);  
				}
				printf(" member list submitted successfully to %s district\n", agentDistrict);
				fclose(fp);
			}

			bzero(userInput,sizeof(userInput));
		}
		else if(strcmp(userInput, "Search") == 0){
			send(clientSocket, userInput, strlen(userInput), 0);
			scanf("%s",userInput);
			strTrim(userInput);
			printf("\n\nSearch returned the following records\n");

			// if( true ){
			// 	printf("No Search result matching your criteria\n");

			// }else{
			// 	send(clientSocket, userInput, strlen(userInput), 0);
			// 	scanf("%s",userInput);
			// 	strTrim(userInput);
			// 	printf("Search reurned the following records\n");
			// }

			//receiver module
            receiver(clientSocket,userInput,agentDistrict);
			printf("\nOperation successful\n"); 

		}else if(strcmp(userInput, "Check_status") == 0){
			send(clientSocket, userInput, sizeof(userInput), 0);
			send(clientSocket, agentDistrict, sizeof(agentDistrict), 0);
			send(clientSocket, agentUsername, sizeof(agentUsername), 0);

		}else if(strcmp(userInput, "get_statement") == 0){
			send(clientSocket, userInput, sizeof(userInput), 0);

			//check module
            receiver(clientSocket,agentUsername,agentDistrict);
			bzero(userInput,sizeof(userInput));
		}
		else{
			printf("\n\n((%s)) is not a valid command!!\n", userInput);
		}

	}
	return 0;
}
