module.exports.run = async (bot, message, args) => {

    if (!args[0]) return message.reply("Gebruik Steen, Papier of Schaar!");

    var options = ["steen", "papier", "schaar"];

    var result = options[Math.floor(Math.random() * options.length)];

    switch(args[0].toUpperCase()){

        case "STEEN":
            switch(result){
                case "steen":
                    message.channel.send(`Ik heb ${result} 🗿  **Het is gelijkspel!**`);
                    break;
            }
            switch(result){
                case "schaar":
                     message.channel.send(`Ik heb ${result} ✂  **Ik win!**`);
                     break;
            }
            switch(result){
                case "papier":
                     message.channel.send(`Ik heb ${result} 📃  **jij wint!**`);
                     break;
            }

        case "PAPIER":
            switch(result){
                case "steen":
                    message.channel.send(`Ik heb ${result} 🗿  **Jij wint!**`);
                    break;
            }
            switch(result){
                case "schaar":
                     message.channel.send(`Ik heb ${result} ✂  **Ik win!**`);
                     break;
            }
            switch(result){
                case "papier":
                     message.channel.send(`Ik heb ${result} 📃  **Het is gelijkspel!**`);
                     break;
            }
           
        break;

        case "SCHAAR":
            switch(result){
                case "steen":
                    message.channel.send(`Ik heb ${result} 🗿  **Ik win!**`);
                    break;
            }
            switch(result){
                case "schaar":
                     message.channel.send(`Ik heb ${result} ✂  **Het is gelijkspel!**`);
                     break;
            }
            switch(result){
                case "papier":
                     message.channel.send(`Ik heb ${result} 📃  **Jij wint!**`);
                     break;
            }
          
        break;

        default:

        return message.channel.send("Gebruik: Steen, Papier of Schaar om de command te gebruiken!");


    }

}

module.exports.help = {
    name: "sps",
    category: "general",
    description: "Doe Steen, Papier En Schaar!"
    
}