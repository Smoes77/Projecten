const ms = require("ms");

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
    
    var muteTime = args[1];

    if(!muteTime) return message.channel.send("Geef eent tijd mee");

    if(mutePerson.roles.cache.some(role => role.name === "Muted")){
        message.channel.send("Deze gebruiker is al gemuted");

    } else {
        mutePerson.roles.add(muteRole.id);
        message.channel.send(`${mutePerson} is gemuted voor ${muteTime}`);

        if(!tempMute[mutePerson]) tempMute[mutePerson] = {
            time: 0

        };

        let date = new Date();
        let dateMilli = date.getTime();
        let dateAdded = dateMilli + ms(muteTime);

        tempMute[mutePerson].time = dateAdded;

        fs.writeFile("./tempMutes.json", JSON.stringify(tempMute), (err ) => {
            if(err) console.log(err);
        });

      //  setTimeout(() => {

          //  mutePerson.roles.remove(muteRole.id);

  //      }, ms(muteTime));
    }

}

module.exports.help = {
    name: "mute",
    category: "admin",
    description: "Mute een member!"
    
}