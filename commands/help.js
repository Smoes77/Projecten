const botConfig = require("../botConfig.json");


module.exports.run = async (client, message, args) => {

    try {

        var prefix = botConfig.prefix;

        var response = "**Bot Commands**\r\n\n";
        var general = "**__Algemene Commands__**\n";
        var info = "\n**__Informele Commands__**\n";
        var admin = "\n**__Admin Commands__**\n";

        client.commands.forEach(command => {

            switch(command.help.category){

                case "general":
                    general += `${prefix}${command.help.name} - ${command.help.description}\r\n`;

                break;

                case "info":
                    info += `${prefix}${command.help.name} - ${command.help.description}\r\n`;
                
                break;

                case "admin":
                    admin += `${prefix}${command.help.name} - ${command.help.description}\r\n`;
                
                break;

            }

        });

        response += general + info + admin;

        message.author.send(response).then(() => {
            return message.reply("Bericht is verstuurd naar je Privé Messages!");
        }).catch(() => {
            return message.reply("Je privé berichten zijn uitgeschakeld.");
        })



    } catch (error) {
        message.reply("Er is iets fout gegaan!")
    }

}

module.exports.help = {
    name: "help",
    category: "info",
    description: "geeft dit menu aan."
}