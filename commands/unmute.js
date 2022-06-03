
const fs = require("fs");
const tempMute = JSON.parse(fs.readFileSync("./tempMutes.json", "utf8"));

module.exports.run = async (client, message, args) => {

    
    if(!message.member.permissions.has("KICK_MEMBERS")) return message.reply("Je hebt niet de goede permissions voor deze command");

    if(!args[0])return message.reply("Je moet een gebruiker meegeven");

    var mutePerson = message.guild.members.cache.get(message.mentions.users.first().id || message.guild.members.get(args[0]).id);

    if(!mutePerson) return message.reply("Kan de gebruiker niet vinden");

    if(mutePerson.permissions.has("MANAGE_MESSAGES")) return message.reply("Gozer dit is een staff wat doe je.");

    let muteRole = message.guild.roles.cache.get("947473737555509260");

    if(!muteRole) return message.channel.send("De rol muted bestaat niet");

    if(!mutePerson.roles.cache.some(role => role.name === "Muted")){
        message.channel.send("Deze gebruiker is al geunmuted");

    } else {
        mutePerson.roles.remove(muteRole.id);
        message.channel.send(`${mutePerson} is geunmuted`);

        tempMute[mutePerson].time = 0;

        fs.writeFile("./tempMutes.json", JSON.stringify(tempMute), (err ) => {
            if(err) console.log(err);
        });

        
    }

}

module.exports.help = {
    name: "unmute",
    category: "admin",
    description: "Unmute een member!"
    
}